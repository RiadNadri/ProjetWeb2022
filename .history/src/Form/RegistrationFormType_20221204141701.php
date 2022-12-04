<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Miage;
use App\Entity\Statut;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('prenom', TextType::class, [
                'attr' => ['class'=>'form-control']
            ])
            ->add('date_naissance', BirthdayType::class,[
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                    'widget' => 'single_text',
                    'input_format' => 'dd-mm-yyyy',

                ]
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
                'mapped'=>false,
                'multiple'=>true,
                'expanded'=>true
                
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label'=> 'J\'accepte que mes données soit utilisées.'
            ])
            ->add('plainPassword', PasswordType::class, [
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            
        ]);
    }
}
