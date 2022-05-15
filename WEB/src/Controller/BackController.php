<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/admin", name="app_back")
     */
    public function index1(): Response
    {
        return $this->render('base_BACK.html.twig');
    }
}
