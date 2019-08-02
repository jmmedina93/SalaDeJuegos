<?php

namespace App\Form;

use App\Entity\Roles;
use App\Entity\Centro;
use App\Entity\Idioma;
use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::Class)
            ->add('email', EmailType::Class)
            ->add('password', PasswordType::Class)
            ->add('phone', TextType::class)
            ->add('roles', EntityType::Class, [
                'class' => Roles::Class,
                'choice_label' => 'name',
                'placeholder' => 'Elija el tipo de Usuario'
            ])
            ->add('idioma', EntityType::Class, [
                'class' => Idioma::Class,
                'choice_label' => 'name',
                'placeholder' => 'Elija un idioma'
            ])
            ->add('centro', EntityType::Class, [
                'class' => Centro::Class,
                'choice_label' => 'nombre',
                'placeholder' => 'Elija un centro'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
