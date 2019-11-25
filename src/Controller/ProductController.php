<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Form\ContactType;
use App\Form\ProductSearchType;
use App\Notification\ContactNotif;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

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
     * @param Product $product
     * @param string $slug
     * @param Request $request
     * @param ContactNotif $notification
     * @return Response;
     * Affiche un produit en particulier et envoi de mail
     */
    public function show( Product $product, string $slug, Request $request, ContactNotif $notification ): Response
    {
        if($product -> getSlug() !== $slug) {
            return $this -> redirectToRoute( 'product.show', [
                'id'   => $product -> getId(),
                'slug' => $product -> getSlug()
            ], 301 );
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
            'form'         => $form -> createView()
        ] );
    }
}
