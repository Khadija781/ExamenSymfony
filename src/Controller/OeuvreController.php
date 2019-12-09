<?php

namespace App\Controller;

use App\Form\SelectionType;
use App\Repository\ArtisteRepository;
use App\Repository\CategoryRepository;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OeuvreController extends AbstractController
{
    /**
     * @Route("/oeuvres", name="oeuvre.index")
     */
    public function index(OeuvreRepository $oeuvreRepository):Response
    {
        $oeuvres = $oeuvreRepository->findAll();
        $type = SelectionType::class;
        $form = $this->createForm($type);


        return $this->render('oeuvre/index.html.twig', [
            'oeuvres' => $oeuvres,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/oeuvres/{id}", name="oeuvre.details")
     */
    public function details(OeuvreRepository $oeuvreRepository, int $id, CategoryRepository $categoryRepository, ArtisteRepository $artisteRepository):Response
    {
        $result = $oeuvreRepository->find($id);

        return $this->render('oeuvre/details.html.twig', [
            'result' => $result
        ]);
    }

}