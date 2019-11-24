<?php

namespace App\Form;

use App\Entity\ProductSearch;
use App\Entity\Specificities;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * Formulaire de recherche dans la page list , recherche par prix et specificities
     */
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            -> add( 'minPrice', IntegerType::class, [
                'required' => false,
                'label'    => false,
                'attr'     => [
                    'placeholder' => 'Budget minimum'
                ]
            ] )
            -> add( 'maxPrice', IntegerType::class, [
                'required' => false,
                'label'    => false,
                'attr'     => [
                    'placeholder' => 'Budget maximal'
                ]
            ] )
            // ->add('submit', SubmitType::class, [
            //   'label'=> 'Rechercher'
            // ])
            -> add( 'options', EntityType::class, [
                'required'     => false,
                'label'        => false,
                'class'        => Specificities::class,
                'choice_label' => 'name',
                'multiple'     => true
            ] );
    }

    public function configureOptions( OptionsResolver $resolver )
    {
        $resolver -> setDefaults( [
            'data_class'      => ProductSearch::class,
            'method'          => 'get',
            'csrf_protection' => false
        ] );
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
