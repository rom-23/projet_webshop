<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment/{id}", name="payment")
     * @param CartService $cartService
     * @param Request $request
     * @return Response
     */
    public function payment(CartService $cartService,Request $request)
    {
        $idOrder=$request->get('id');


        $total =$cartService->getTotal();

$cartService->payment($idOrder);


        return $this->render('ordering/confirm.html.twig', [


            'total'=>$total
        ]);

    }

}
