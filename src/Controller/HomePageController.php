<?php

namespace App\Controller;

use App\Repository\TimelinesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(TimelinesRepository $timelines)
    {
        $newtimelines = $timelines->findBy(array(), array('id' => 'DESC'),3);
        $besttimelines = $timelines->findBy(array(), array('id' => 'ASC'),2);// modifier id par le champs notation lorsque celui-ci sera implementé


        return $this->render('homepage.html.twig', [
            'controller_name' => 'HomePageController',
            'newtimeline' => $newtimelines,
            'besttimeline' => $besttimelines,
        ]);
    }
}
