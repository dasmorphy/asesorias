<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->en = $en;   
    }

    #[Route('/', name: 'app_post')]
    public function index(): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($_REQUEST);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->en->getRepository(User::class)->find(1);
        }

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
