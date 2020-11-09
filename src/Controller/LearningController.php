<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class LearningController extends AbstractController
{
    private $session;
    private string $name = "Unknown";

//Construct session
    public function __construct(SessionInterface $session)
    {
        $this->session= $session;
    }

    /**
     * @Route("/", name="homepage")
     */
/*    public function homePage(): Response
    {
        return $this->redirectToRoute('show-my-name');
    }*/

    /**
     * @Route("/learning", name="learning")
     */
/*    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }*/


    //If name is filled in, return the aboutMe page with name. Else forward to homepage.
    /**
     * @Route("/about-becode", name="about-me")
     */
    public function aboutMe(): Response
    {
        if($this->session->get('name')){
            $name = $this->session->get('name');
            return $this->render('learning/about-me.html.twig', [
                'name' => $name,
            ]);
        } else {
            return $this->forward('App\Controller\LearningController::showMyName');
        }
    }

    //Show name if session exists, else show unknown.
    /**
     * @Route("/", name="show-my-name")
     */
    public function showMyName(): Response
    {
        if($this->session->get('name')){
            $name = $this->session->get('name');
/*            return $this->render('learning/show-my-name.html.twig', [
                'name' => $name,
            ]);*/
        } else {
            $name = "unknown";
/*            return $this->render('learning/show-my-name.html.twig', [
                'name' => $name,
            ]);*/
        }
        return $this->render('learning/show-my-name.html.twig', [
            'name' => $name,
        ]);
    }

    //Get name with POST, redirect to show-my-name & route is POST
    /**
     * @Route("/change-my-name", name="change-my-name", methods={"POST"})
     * @return RedirectResponse
     */
    public function changeMyName(): Response
    {
        $this->session->set('name', $_POST['name']);
        $this->render('learning/change-my-name.html.twig', [
            'name' => $_POST['name'],
        ]);
        return $this->redirectToRoute('show-my-name');
    }
}