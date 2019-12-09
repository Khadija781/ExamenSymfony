<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\Model\ContactModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ContactController extends AbstractController
{
	/**
	 * @Route("/contact", name="contact.form")
	 */
	public function form(Request $request, \Swift_Mailer $mailer, Environment $twig):Response
	{
		// affichage du formulaire
		$type = ContactType::class;
		$model = new ContactModel();

		$form = $this->createForm($type, $model);

		// handleRequest : récupération des données en $_POST
		$form->handleRequest($request);

		
		if($form->isSubmitted() && $form->isValid()){
			// getData : récupération des données du formulaire
			//dd($form->getData());
            $firstname = $form->get('firstname')->getData();
            $lastname = $form->get('lastname')->getData();
            $email = $form->get('email')->getData();
            $message = $form->get('message')->getData();
			// message
			$message = new \Swift_Message();
			$message
				->setFrom('4fac0ec5a7-8d7ce2@inbox.mailtrap.io')
				->setSubject('Contact')
				->setContentType('text/html')
				->setBody(
					$twig->render('emailing/contact.html.twig', [
						'data' => $form->getData()
					])
				)
				->addPart(
					$twig->render('emailing/contact.txt.twig', [
						'data' => $form->getData()
					]), 'text/plain'
				)
			;

			// envoi de l'email
			$mailer->send($message);

			/*
			 * message flash : message mis en session lu une seule fois
			 *  - clé créée en session
			 *  - message stocké en session
			 */
			$this->addFlash('notice', 'Un email vous a été envoyé');

			// redirection vers une route par son nom
			return $this->redirectToRoute('contact.form');
		}

		return $this->render('contact/form.html.twig', [
			'form' => $form->createView()
		]);
	}
}