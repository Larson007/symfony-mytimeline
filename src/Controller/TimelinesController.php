<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Timelines;
use App\Form\CategoriesType;
use App\Form\TimelineType;
use App\Repository\TimelinesRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TimelinesController extends AbstractController
{
    /**
     * @Route("/timelines", name="timelines")
     */
    public function index(TimelinesRepository $timelines, CategoriesRepository $categories)
    {
        $timelines = $timelines->findAll();
        $categories = $categories->findAll();

        return $this->render('timelines/index.html.twig', [
            'controller_name' => 'TimelinesController',
            'timelines' => $timelines,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/timelines/show", name="timeline_show")
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
            foreach ($timeline->getCategories() as $categories) {

                // On précise que le theme est lié à la timeline
                $categories  ->setCategories($timeline);

                // On dde au manager de faire persiste 
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($categories);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($timeline);
            $entityManager->flush();

            return $this->redirectToRoute('timelines');
        }
        return $this->render('timelines/new.html.twig', [
            'timeline' => $form->createView(),
        ]);
    }
}
