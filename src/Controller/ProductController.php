<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Entity\User;
use App\Form\CommentType;
use App\Form\ContactType;
use App\Form\ProductSearchType;
use App\Notification\ContactNotif;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * PropertyController constructor.
     * @param ProductRepository $repository
     */
    public function __construct( ProductRepository $repository )
    {
        $this -> repository = $repository;
    }

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
     * @Route("/list", name="product.list")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     * Tous les produits ( page list ) avec pagination et filtres de recherche
     */
    public function list( PaginatorInterface $paginator, Request $request ): Response
    {
        $search = new ProductSearch();
        $form = $this -> createForm( ProductSearchType::class, $search );
        $form -> handleRequest( $request );

        $products = $paginator -> paginate(
            $this -> repository -> findAllVisibleQuery( $search ),
            $request -> query -> getInt( 'page', 1 ),
            9
        );
        return $this -> render( 'product/ProductList.html.twig', [
            'pagination'   => $paginator,
            'products'     => $products,
            'current_menu' => 'products',
            'form'         => $form -> createView()
        ] );
    }

    /**
     * @Route("/product/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param UserInterface $userOnline
     * @param Product $product
     * @param string $slug
     * @param Request $request
     * @param ContactNotif $notification
     * @param EntityManagerInterface $manager
     * @return Response;
     * Affiche un produit en particulier et envoi de mail
     * @throws \Exception
     */
    public function show( Product $product, string $slug, Request $request, ContactNotif $notification, EntityManagerInterface $manager ): Response
    {
        if($product -> getSlug() !== $slug) {
            return $this -> redirectToRoute( 'product.show', [
                'id'   => $product -> getId(),
                'slug' => $product -> getSlug()
            ], 301 );
        }
         $userlog = $this->get('security.token_storage')->getToken()->getUser();
        $comment = new Comment();
        $formComment = $this -> createForm( CommentType::class, $comment);
        $formComment -> handleRequest( $request );
        if($formComment -> isSubmitted() && $formComment -> isValid()) {
            $comment
                -> setCreatedAt( new \DateTime() )
                -> setProducts( $product )
                ->setUser($userlog);

            $manager -> persist( $comment );
            $manager -> flush();
            return $this -> redirectToRoute( 'product.show', [
                'id' => $product -> getId(),
                'slug' => $product -> getSlug()
            ] );
        }

        $contact = new Contact();
        $contact -> setProduct( $product );
        $form = $this -> createForm( ContactType::class, $contact );
        $form -> handleRequest( $request );

        if($form -> isSubmitted() && $form -> isValid()) {
            $notification -> notify( $contact );
            $this -> addFlash( 'success', 'Email envoyé' );
            return $this -> redirectToRoute( 'product.show', [
                'id'   => $product -> getId(),
                'slug' => $product -> getSlug()
            ] );
        }

        return $this -> render( 'product/Show.html.twig', [
            'product'      => $product,
            'current_menu' => 'products',
            'form'         => $form -> createView(),
            'commentForm'  => $formComment -> createView(),
            'userConnect'=>$this->getUser()
        ] );
    }
}
