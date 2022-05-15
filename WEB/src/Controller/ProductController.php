<?php

namespace App\Controller;

use App\Entity\Calender;
use App\Entity\Product;
use App\Form\CategorieType;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product")
 */
class ProductController extends AbstractController

{
    /**

     * @Route("/", name="product_index", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="product_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product=$form->getData();
          //  dd($data);
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash('succes',"Produit est crée" );
            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}/edit", name="product_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_delete", methods={"POST"})
     */
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
    }




    /**
     * @Route("/stat", name="stat")
     */
    public function statistiques(ProductRepository $proRepo){

        // On va chercher le nombre d'annonces publiées par date
        $produit = $proRepo->countByDate();

        $dates = [];
        $produitCount = [];

        // On "démonte" les données pour les séparer tel qu'attendu par ChartJS
        foreach($produit as $produit){
            $dates[] = $produit['datefin'];
            $produitCount[] = $produit['count'];
        }

        return $this->render('admin/stats.html.twig', [
            'dates' => json_encode($dates),
            'produitCount' => json_encode($produitCount),
        ]);
    }








}
