<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class OrderingController extends AbstractController
{
    /**
     * @Route("/ordering", name="ordering")
     * @param CartService $cartService
     * @param UserInterface $user
     * @return Response
     * @throws Exception
     */
    public function index(CartService $cartService, UserInterface $user)
    {
        return $this->render('ordering/ordering.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal(),
            'ordering' => $cartService->ordering($user)
        ]);
    }

}
