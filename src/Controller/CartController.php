<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     * @param CartService $cartService
     * @return Response
     */
    public function cart( CartService $cartService )
    {
        return $this -> render( 'cart/cart.html.twig', [
            'items' => $cartService -> getFullCart(),
            'total' => $cartService -> getTotal()
        ] );
    }

    /**
     * @Route("/cart/add/{id}", name="cart.add")
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function add( $id, CartService $cartService )
    {
        $cartService -> add( $id );
        return $this -> redirectToRoute( 'cart' );
    }

    /**
     * @Route("/cart/remove/{id}", name="cart.remove")
     * @param $id
     * @param CartService $cartService
     * @return RedirectResponse
     */
    public function remove( $id, CartService $cartService )
    {
        $cartService -> remove( $id );
        return $this -> redirectToRoute( 'cart' );
    }
}
