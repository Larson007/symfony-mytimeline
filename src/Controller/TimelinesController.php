<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TimelinesController extends AbstractController
{
    /**
     * @Route("/timelines", name="timelines")
     */
    public function index()
    {
        return $this->render('timelines/index.html.twig', [
            'controller_name' => 'TimelinesController',
        ]);
    }
}
