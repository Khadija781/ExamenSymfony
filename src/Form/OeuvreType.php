<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Category;
use App\Entity\Oeuvre;
use App\EventSubscriber\Form\OeuvreFormSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'error_bubbling' => true,
        'constraints' => [
            new NotBlank([
                "message" => "Le nom est obligatoire"
            ])
        ]
    ])
            ->add('description', TextareaType::class, [
                'error_bubbling' => true,
                'constraints' => [
                    new NotBlank([
                        "message" => "La description est obligatoire"
                    ])
                ]
            ])
            ->add('category', EntityType::class, [
                'error_bubbling' => true,
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "La catégorie est obligatoire"
                    ])
                ]
            ])
            ->add('artiste', EntityType::class, [
                'error_bubbling' => true,
                'class' => Artiste::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "L'artiste est obligatoire"
                    ])
                ]
            ])
        ;
        //ajout d'un souscripteur de formulaire
        $builder->addEventSubscriber(new OeuvreFormSubscriber());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
            'constraints' => [
                new UniqueEntity(['fields' => ['name'],
                    'message' => 'Cet oeuvre éxiste déjà'])
            ],
        ]);
    }
}
