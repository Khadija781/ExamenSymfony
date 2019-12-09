<?php

namespace App\Form;

use App\Form\Model\ContactModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	// options : accèder aux options du formulaire
	    //dump($options['data']);

    	/*
    	 * add : ajout d'un champ dans le formulaire
    	 *  - nom du champ
    	 *  - type du champ
    	 *  - options du champ
    	 *      - constraints: contraintes de validation
    	 */
        $builder
            ->add('firstname', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            			'message' => "Le prénom est obligatoire"
		            ]),
		            new Length([
		            	'min' => 2,
			            'minMessage' => "Le prénom doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ])
            ->add('lastname', TextType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le nom est obligatoire"
		            ]),
		            new Length([
			            'min' => 2,
			            'minMessage' => "Le nom doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ])
            ->add('email', EmailType::class, [
            	'constraints' => [
            		new NotBlank([
            			'message' => "L'email est obligatoire"
		            ]),
		            new Email([
		            	'message' => "L'email n'est pas valide"
		            ])
	            ]
            ])
            ->add('message', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
			            'message' => "Le message est obligatoire"
		            ]),
		            new Length([
			            'min' => 20,
			            'minMessage' => "Le message doit comporter {{ limit }} caractères au minimum"
		            ])
	            ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	// data_class : définir l'instance renvoyée après la validation du formulaire
        $resolver->setDefaults([
            'data_class' => ContactModel::class
        ]);
    }
}
