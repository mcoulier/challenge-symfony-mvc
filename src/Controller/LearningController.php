<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homePage(): Response
    {
        return $this->redirectToRoute('show-my-name');
    }
    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    /**
     * @Route("/about-me", name="about-me")
     */
    public function aboutMe(): Response
    {
        return $this->render('learning/about-me.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    /**
     * @Route("/show-my-name", name="show-my-name")
     */
    public function showMyName(): Response
    {
        return $this->render('learning/show-my-name.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    /**
     * @Route("/change-my-name", name="change-my-name")
     */
    public function changeMyName(): Response
    {
        return $this->render('learning/change-my-name.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
}