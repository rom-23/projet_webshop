<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     * @param ProductRepository $repository
     * @return Response
     */
    public function product( ProductRepository $repository )
    {
        $products = $repository -> findLatestProduct();
        return $this -> render( 'product/Product.html.twig', [
            'products'     => $products,
            'current_menu' => 'products'
        ] );
    }

    /**
     * @Route("/product/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Product $product
     * @param string $slug
     * @param Request $request
     * @return Response;
     */
    public function show( Product $product, string $slug, Request $request ): Response
    {
        if($product -> getSlug() !== $slug) {
            return $this -> redirectToRoute( 'product.show', [
                'id'   => $product -> getId(),
                'slug' => $product -> getSlug()
            ], 301 );
        }
//        $contact = new Contact2();
//        $contact -> setProperty( $property );
//        $form = $this -> createForm( ContactType::class, $contact );
//        $form -> handleRequest( $request );
//
//        if($form -> isSubmitted() && $form -> isValid()) {
//            $notification -> notify( $contact );
//            $this -> addFlash( 'success', 'Email envoyé' );
//            return $this -> redirectToRoute( 'property.show', [
//                'id'   => $property -> getId(),
//                'slug' => $property -> getSlug()
//            ] );
//        }
        return $this -> render( 'product/Show.html.twig', [
            'product' => $product,
            'current_menu' => 'products'
        ] );
    }
}
