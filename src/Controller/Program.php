<?php
  namespace App\Controller;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  
  class Program extends AbstractController {
  /**
  * @Route("/")
  */
    public function index(){
      return $this->render('index.html.twig');
    }
  }

