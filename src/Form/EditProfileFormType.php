<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Miage;
use App\Entity\Statut;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class'=>'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('prenom', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('adresse', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('telephone', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('refMiage',EntityType::class,[
                'class'=> Miage::class,
                'placeholder'=>'Indiquez votre Miage',
                'choice_label'=>'universite',
                'attr' => ['class'=>'form-control']
            ])
            ->add('statut', EntityType::class,[
                'class'=> Statut::class,
                'choice_label'=> 'nom',
                
                'multiple'=>true,
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
