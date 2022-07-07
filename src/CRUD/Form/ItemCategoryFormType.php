<?php

namespace App\CRUD\Form;

use App\Entity\ItemCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemCategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('parentId')
            ->add('sort')
            ->add('switch')
            ->add('name')
            ->add('url')
            ->add('icon')
            ->add('shortDescription')
            ->add('description')
            ->add('params')
            ->add('bottomText')
            ->add('seoTitle')
            ->add('seoDescription')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemCategory::class,
        ]);
    }
}
