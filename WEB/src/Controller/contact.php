<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class contact extends AbstractController
{
    /**
     * @Route("/contact", name="app_back")
     */
    public function index(): Response
    {
        return $this->render('contact.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
}
