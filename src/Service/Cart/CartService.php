<?php

namespace App\Service\Cart;

use App\Entity\Ordering;
use App\Entity\OrderingProduct;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\OrderingRepository;


use Doctrine\ORM\EntityManagerInterface;

class CartService
{
    protected $session;
    protected $productRepository;
    protected $orderingRepository;
    protected $manager;

    /**
     * CartService constructor.
     * @param SessionInterface $session
     * @param OrderingRepository $orderingRepository
     * @param ProductRepository $productRepository
     * @param EntityManagerInterface $manager
     */
    public function __construct(SessionInterface $session,OrderingRepository $orderingRepository, ProductRepository $productRepository, EntityManagerInterface $manager)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
        $this->orderingRepository = $orderingRepository;
        $this->manager = $manager;
    }

    public function add(int $id)
    {
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $this->session->set('cart', $cart);
    }

    public function remove(int $id)
    {
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $this->session->set('cart', $cart);
    }

    public function getFullCart(): array
    {
        $cart = $this->session->get('cart', []);
        $cartWithData = [];
        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $cartWithData;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getFullCart() as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function ordering($user)
    {
        $ordering = new Ordering();
        $ordering->setOrderDate(new \DateTime());
        $ordering->setReference('ref_' . $user . '_' . rand(100, 100000));
        $ordering->setUsers($user);
        $this->manager->persist($ordering);
        $this->manager->flush();
        return $ordering;
    }

    public function payment($idOrder)
    {
        foreach ($this->getFullCart() as $item) {
            $orderingProduct = new OrderingProduct();
            $ordering = $this->orderingRepository->find($idOrder);
            $products = $this->productRepository->find($item['product']->getId());

            $orderingProduct->setReference($products->getName());
            $orderingProduct->setCreatedAt(new \DateTime());
            $orderingProduct->setQuantity($item['quantity']);
            $orderingProduct->setTotal($item['product']->getPrice() * $item['quantity']);
            $orderingProduct->setProducts($products);
            $orderingProduct->setOrderings($ordering);

            $this->manager->persist($orderingProduct);
            $this->manager->flush();
        }
    }
}
