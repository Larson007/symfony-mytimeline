<?php

namespace App\Controller;

use App\Entity\Timelines;
use App\Form\TimelineType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/timeline", name="timeline")
     */
    public function show()
    {

        return $this->render('timelines/show.html.twig', [
            'controller_name' => 'TimelinesController',
        ]);
    }

    /**
     * @Route("/new", name="timeline-new")
     */
    public function new(Request $request)
    {
        $timeline = new Timelines();
        $form = $this->createForm(TimelineType::class, $timeline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($timeline);
            $entityManager->flush();

        }
        return $this->render('timelines/new.html.twig', [
            'Timeline' => $form->createView(),
        ]);
    }
}
