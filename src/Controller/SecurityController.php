<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class SecurityController extends AbstractController
{
    #MAILER

     private EmailVerifier $emailVerifier;

       public function __construct(EmailVerifier $emailVerifier)
     {
    $this->emailVerifier = $emailVerifier;
     }


    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             $roles =$user->getRoles() ;
            if( $roles = $expressionLanguage->evaluate('roles["ROLE_ADMIN"] == [ROLE_ADMIN] ')){
             return $this->redirectToRoute('/back');}
         }
         else {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);}
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register2", name="app_register2")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, GuardAuthenticatorHandler $guardHandler, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
           #MAILER

              $this->emailVerifier->sendEmailConfirmation('app_verify_email2', $user,
                (new TemplatedEmail())
                    ->from(new Address('noreply.cyberark@gmail.com', 'CyberARK mail Bot'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email2", name="app_verify_email2")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('base');
    }




    /**
     * @Route("/signupjson", name="signupjson")
     */
    public function signup(Request $request, NormalizerInterface $Normalizer,UserPasswordEncoderInterface $userPasswordEncoder )
    {
        //Nous utilisons la Repository pour récupérer les objets que nous avons dans la base de données

        //Nous utilisons la fonction normalize qui transforme en format JSON nos donnée qui sont
        //en tableau d'objet Students
        $em=$this->getDoctrine()->getManager();
        $user=new User();
        $user->setPassword( $userPasswordEncoder->encodePassword(
            $user,
            $request->get('plainPassword')->getData()
        )
        );

        $em->persist($user);
        $em->flush();
        $jsonContent=$Normalizer->normalize($user,'json',['groups'=>'user']);

        return new Response(json_encode($jsonContent));

    }
}


