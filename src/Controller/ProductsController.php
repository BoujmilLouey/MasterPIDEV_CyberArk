<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="product_index")
     */
    public function index(ProductsRepository $productsRepository)
    {
        return $this->render('products/index.html.twig', [
            'products' => $productsRepository->findAll()
        ]);
    }
    /**
     * @Route("/message", name="pp_new", methods={"GET", "POST"})
     */
    public function message(Request $request, EntityManagerInterface $entityManager): Response
    {


        return $this->render('products/new.html.twig');
    }

}
