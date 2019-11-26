<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\User;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\UserInterface;

class CommentType extends AbstractType
{

    public function buildForm( FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author')
            ->add('content')
           // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class
        ]);
    }
}
