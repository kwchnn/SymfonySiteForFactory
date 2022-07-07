<?php 

namespace App\FormBuilder;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormBuilderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, $options)
    {
        $builder
            ->add('email', TextType::class, ['label' => 'Адрес электронной почты или телефон','constraints' => new Assert\NotBlank])
            ->add('name', TextType::class, ['label' => 'Имя'])
            ->add('text', TextType::class, ['label' => 'Информация о заказе']);

    }
}