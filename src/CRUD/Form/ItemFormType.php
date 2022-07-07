<?php

namespace App\CRUD\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('itemCategoryId')
            ->add('sort')
            ->add('name')
            ->add('description')
            ->add('params')
            ->add('price')
            ->add('seoTitle')
            ->add('seoDescriptions')
            //->add('itemCategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
