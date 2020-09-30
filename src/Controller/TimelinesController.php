<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Timelines;
use App\Form\CategoriesType;
use App\Form\TimelineType;
use App\Repository\TimelinesRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoriesRepository;
use App\Repository\EventsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TimelinesController extends AbstractController
{
    /**
     * @Route("/timelines/{page<\d+>?1}", name="timelines")
     */
    public function index(TimelinesRepository $timelines, $page)
    {
        $limit = 5;
        // $start definit le offset Explication :https://mega.nz/file/DSQXmaJD#w3o_pb97Uvr4SnJ8n6D51SU-PberDsX1NTWIol1kD2M -> 4min
        $start = $page * $limit - $limit;
        // Connaitre le nombre de page en fonction de nombre de timlines
        $total = count($timelines->findAll());
        $pages = ceil($total / $limit); // 3.4 pages => 4 pages via la fonction PHP ceil
        $timelines = $timelines->findBy([], [], $limit, $start);

        return $this->render('timelines/index.html.twig', [
            'timelines' => $timelines,
            'pages' => $pages,
            'page' => $page,
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
                $categories->setCategories($timeline);

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

    /**
     * @Route("/show", name="timeline_show")
     */
    public function show()
    {
        return $this->render('timelines/show.html.twig', [
            'controller_name' => 'TimelinesController',
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test(HttpClientInterface $client)
    {

        /*$response = $client->request('GET', 'https://127.0.0.1:8000/api/timelines', [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        */
        return $this->render('timelines/test.html.twig', [  
        ]);
    }
}

