<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home( SessionInterface $session)
    {
        $panier=$session->get('panier',[]);
        $session->set('panier',$panier);
        return $this -> render( 'home/index.html.twig' );
    }


}
