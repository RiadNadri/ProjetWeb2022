<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Activite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiviteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refActivite', EntityType::class,[
                'class' => Activite::class,
                'placeholder'=>'Choisissez la ou les activités',
                'choice_label'=>'nom', 
                'multiple' => true,
                
                'expanded'=>true,
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
