<?php

namespace App\Controller;

use App\Repository\ExpositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpositionController extends AbstractController
{
    /**
     * @Route("/exposition", name="exposition.index")
     */
    public function index(ExpositionRepository $expositionRepository):Response
    {
        $expositions = $expositionRepository->GetFutureExpos()->getResult();

        $prevexpos = $expositionRepository->GetPreviousExpos()->getResult();


        return $this->render('exposition/index.html.twig', [
            'expositions' => $expositions,
            'prevexpos' => $prevexpos
        ]);
    }
}