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
     * @Route("/adminproducts/new", name="pp_new", methods={"GET", "POST"})
     */
    public function message(Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('products/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
     /**
     * @Route("/adminproducts/{id}/edit", name="pp_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Products $product, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('products/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/adminproducts/{id}", name="products_delete", methods={"GET", "POST"})
     */
    public function delete(Request $request, Products $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('products_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/adminproducts", name="productsadmin", methods={"GET", "POST"})
     */
    public function indexx(ProductsRepository $productsRepository): Response
    {
        return $this->render('products/show.html.twig', [
            'products' => $productsRepository->findAll(),
        ]);
    }
    /**
     * @Route("/stat", name="stat")
     */
    public function statistiques(ProductsRepository $proRepo){

        // On va chercher le nombre d'annonces publiées par date
        $produit = $proRepo->countByDate();

        $dates = [];
        $produitCount = [];

        // On "démonte" les données pour les séparer tel qu'attendu par ChartJS
        foreach($produit as $produit){
            $dates[] = $produit['datefin'];
            $produitCount[] = $produit['count'];
        }

        return $this->render('products/stats.html.twig', [
            'dates' => json_encode($dates),
            'produitCount' => json_encode($produitCount),
        ]);
    }
    

}
