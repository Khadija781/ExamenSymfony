<?php

namespace App\Form;

use App\Entity\Exposition;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Unique;

class ExpositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'error_bubbling' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nom de l'expo est obligatoire",
                    ]),
                ]
            ])
            ->add('description', TextareaType::class, [
                'error_bubbling' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "La description de l'expo est obligatoire"
                    ])
                ]
            ])
            ->add('date', DateType::class, [
                'error_bubbling' => true,
                'constraints' => [
                    new GreaterThan([
                        'value' => 'today',
                        'message' => "La date doit être supérieur à la date du jour "
                    ]),
                    new NotBlank([
                        'message' => "Le date de l'expo est obligatoire"
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exposition::class,
            'constraints' => [
                new UniqueEntity(['fields' => ['name'],
                    'message' => 'Cet exposition éxiste déjà'])
            ],
        ]);
    }
}
