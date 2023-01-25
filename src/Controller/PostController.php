<?php

namespace App\Controller;

use App\Entity\User;
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
        $this->em = $em;   
    }

    #[Route('/user/{id}', name: 'app_post')]
    public function index($id): Response
    {
        // $post = new User();
        // $form = $this->createForm(PostType::class, $post);
        // $form->handleRequest($_REQUEST);
        $user = $this->em->getRepository(User::class)->find($id);
        $user_find = $this->em->getRepository(User::class)->findUser($id);



        // if($form->isSubmitted() && $form->isValid()){
        //     $user = $this->em->getRepository(User::class)->find(1);
        // }

        return $this->render('post/index.html.twig', [
            'user' => $user,
            'findUser' => $user_find
        ]);
    }
}
