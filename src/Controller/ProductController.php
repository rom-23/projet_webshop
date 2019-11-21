<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $products = $repository -> findAllProduct();
        return $this -> render( 'product/Product.html.twig', [
            'products'     => $products,
            'current_menu' => 'products'
        ] );
    }
}
