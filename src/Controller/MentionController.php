<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MentionController extends AbstractController
{
/**
* @Route("/mentions", name="mention.index")
*/
public function index():Response
    {
        return $this->render('mentions/index.html.twig');
    }
}