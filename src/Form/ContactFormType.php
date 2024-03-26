<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Prénom :',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => 'Entrez votre prénom'],
            ])
            ->add('age', NumberType::class, [
                'label' => 'Âge :',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => 'Entrez votre âge'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => 'Entrez votre email'],

            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville de résidence :',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => 'Dans quelle ville habitez vous ?'],
            ])
            ->add('content', ChoiceType::class, [
                'label' => 'Contenu avec lequel vous êtes à l\'aise :',
                'choices' => [
                    'Lingerie / Bikini' => 'lingerie_bikini',
                    'Top Less' => 'top_less',
                    'Nude' => 'nude',
                    'Masturbation' => 'masturbation',
                    'Sextape' => 'sextape',
                ],
                'multiple' => true, // Permet de sélectionner plusieurs options
                'expanded' => true, // Utilise des cases à cocher au lieu d'un menu déroulant
            ])
            
            ->add('typePhone', TextType::class, [
                'label' => 'Type de téléphone possédé',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => 'Exemple : Iphone 11'],
            ])
            ->add('onlyfanAccount', ChoiceType::class, [
                'label' => 'Avez vous déjà un compte OnlyFan ?',
                'choices' => [
                    'Oui' => 'yes',
                    'Non' => 'no',
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('hoursDay', ChoiceType::class, [
                'label' => 'Combien d\'heures par jour êtes vous prête à consacrer ?',
                'choices' => [
                    '2 heures' => '0',
                    '3 heures' => '1',
                    '4 heures' => '2',
                    '5 heures ou +' => '3'
                ],
                'multiple' => false,
                'expanded' => true
            ])
            ->add('instagram', TextType::class, [
                'label' => 'Quel est ton pseudo instagram ?',
                'required' => true,
                'attr' => ['class' => 'custom-text-input', 'placeholder' => '@instagram'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le formulaire',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
