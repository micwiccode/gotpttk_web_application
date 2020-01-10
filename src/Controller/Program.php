<?php
  namespace App\Controller;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Session\SessionInterface;

  class Program extends AbstractController {
  /**
  * @Route("/")
  */
    public function index(SessionInterface $session)
  {
    $logged = $session->get('logged');
      return $this->render('index.html.twig', array('logged' => $logged));
    }
  }

