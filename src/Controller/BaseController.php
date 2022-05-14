<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="base")
     */
    public function index(): Response
    {
        $user = new User();
        $roles = $user->getRoles();
        $roles1 =implode($roles);
        return $this->render('base_FRONT.html.twig', [
            'controller_name' => 'BaseController', 'test' => $roles1
        ]);
    }
    /**
     * @Route("/resetpwd", name="app_resetpwd")
     */
    public function index2(): Response
    {
        $this->addFlash('success', 'You have succefully changed your password.');
        return $this->render('reset_password/rstpwd.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

}
