<?php

namespace App\Form;

use App\Entity\Admins;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChangePwdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('oldPassword', PasswordType::class, array(

            'mapped' => false,
            'attr' => [
                'placeholder' => 'Ancien mot de passe',
            ]

        ))

        ->add('plainPassword', RepeatedType::class, array(

            'type' => PasswordType::class,

            'mapped' => false,

            'invalid_message' => 'Les deux mots de passe doivent être identiques',

            'options' => array(

                'attr' => array(

                    'class' => 'password-field'

                )

            ),

            'required' => true,

        ))

        ->add('submit', SubmitType::class, array(

            'attr' => array(

                'class' => 'btn btn-primary btn-block'

            )

        ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admins::class,
        ]);
    }
}
