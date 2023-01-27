<?php

namespace App\Controller;

use App\Entity\Servicio;
use App\Entity\Tiempo;
use App\Entity\User;
use App\Form\TiempoType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;   
    }

    #[Route('/', name: 'app_post')]
    public function index(Request $request): Response
    {
        $post = new Tiempo();
        $form = $this -> createForm(Tiempo::class, $post); //TiempoType
        $form -> handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()){
            $this -> em-> persist($form);
            $this -> em ->flush();
            return $this -> redirectToRoute('app_post');

        }

        return $this->render('post/index.html.twig', [
           'form' => $form-> createView()
        ]);
    }

   




}
