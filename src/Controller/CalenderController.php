<?php

namespace App\Controller;

use App\Entity\Calender;
use App\Form\CalenderType;
use App\Repository\CalenderRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calender")
 */
class CalenderController extends AbstractController
{
    /**
     * @Route("/", name="calender_index", methods={"GET"})
     */
    public function index(CalenderRepository $calenderRepository): Response
    {
        return $this->render('calender/index.html.twig', [
            'calenders' => $calenderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="calender_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calender = new Calender();
        $form = $this->createForm(CalenderType::class, $calender);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($calender);
            $entityManager->flush();

            return $this->redirectToRoute('calender_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calender/new.html.twig', [
            'calender' => $calender,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calender_show", methods={"GET"})
     */
    public function show(Calender $calender): Response
    {
        return $this->render('calender/show.html.twig', [
            'calender' => $calender,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="calender_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Calender $calender, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CalenderType::class, $calender);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('calender_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calender/edit.html.twig', [
            'calender' => $calender,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calender_delete", methods={"POST"})
     */
    public function delete(Request $request, Calender $calender, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calender->getId(), $request->request->get('_token'))) {
            $entityManager->remove($calender);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calender_index', [], Response::HTTP_SEE_OTHER);
    }
}
