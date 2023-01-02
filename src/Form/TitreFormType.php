<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\TitreTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TitreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refTitre', EntityType::class,[
                'class' => TitreTransport::class,
                'placeholder'=>'Choisissez votre titre de transport',
                'choice_label'=>'titre',
                'attr' => ['class'=>'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
