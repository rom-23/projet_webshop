<?php

namespace App\Service\Cart;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    protected $session;
    protected $productRepository;

    /**
     * CartService constructor.
     * @param SessionInterface $session
     * @param ProductRepository $productRepository
     */
    public function __construct( SessionInterface $session, ProductRepository $productRepository )
    {
        $this -> session = $session;
        $this->productRepository = $productRepository;
    }

    public function add( int $id )
    {
        $cart = $this -> session -> get( 'cart', [] );
        if(!empty( $cart[$id] )) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $this -> session -> set( 'cart', $cart );
    }

    public function remove( int $id )
    {
        $cart = $this -> session -> get( 'cart', [] );
        if(!empty( $cart[$id] )) {
            unset( $cart[$id] );
        }
        $this -> session -> set( 'cart', $cart );
    }

    public function getFullCart(): array
    {
        $cart = $this -> session -> get( 'cart', [] );
        $cartWithData = [];
        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'product'  => $this->productRepository -> find( $id ),
                'quantity' => $quantity
            ];
        }
        return $cartWithData;
    }

    public function getTotal(): float
    {
       $total = 0;
        foreach ($this->getFullCart() as $item) {
            $total += $item['product'] -> getPrice() * $item['quantity'];
        }
        return $total;
    }
}
