<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login( AuthenticationUtils $authenticationUtils )
    {
        $error = $authenticationUtils -> getLastAuthenticationError();
        $lastUsername = $authenticationUtils -> getLastUsername();
        return $this -> render( 'security/Login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error
        ] );
    }

    /**
     * @Route("/register", name="security_registration")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return RedirectResponse|Response
     */
    public function inscription(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this -> createForm( RegistrationType::class, $user );
        $form -> handleRequest( $request );
        if($form -> isSubmitted() && $form -> isValid()) {
            $hash = $encoder -> encodePassword( $user, $user -> getPassword() );
            $user -> setPassword( $hash );
            $manager -> persist( $user );
            $manager -> flush();
// permet de connecter l'user directement apres registration
            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->container->get('security.token_storage')->setToken($token);
            $this->container->get('session')->set('_security_main', serialize($token));
            return $this -> redirectToRoute( 'product' );
        }
        return $this -> render( 'security/registration.html.twig', [
            'form' => $form -> createView()
        ] );
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {
    }

}
