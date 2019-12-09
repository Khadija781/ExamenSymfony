<?php

namespace App\EventSubscriber\Form;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class OeuvreFormSubscriber implements EventSubscriberInterface
{
    public function postSetData(FormEvent $event):void
    {
        /*
         * getData : accès à la saisie du formulaire
         * getForm : accès au builder du formulaire
         * $form->getData : entité après la saisie
         */
        $model = $event->getData();
        $form = $event->getForm();
        $entity = $form->getData();

        // si l'entité est mise à jour, pas de condition
        $constraints = $entity->getId() ? [] : [
            new NotBlank([
                "message" => "L'image est obligatoire"
            ]),
            new Image([
                "mimeTypes" => ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'],
                "mimeTypesMessage" => "Vous devez sélectionner une image",
            ])
        ];

        $form->add('image', FileType::class, [
            'error_bubbling' => true,
            'data_class' => null, // éviter une erreur lors de la modification d'un entité
            'constraints' => $constraints
            ]);

       //dd($model, $form, $entity);
    }

    public static function getSubscribedEvents()
    {
        /*
         * PRE_SET_DATA : avant que le formumlaire ait eu accès aux données du modèle
         * POST_SET_DATA : après que le formulaire ait eu accès aux données du modèle
         */
        return [
            FormEvents::POST_SET_DATA => 'postSetData',
        ];
    }
}
