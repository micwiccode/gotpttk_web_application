<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Turysta;

use Symfony\Component\HttpFoundation\Session\SessionInterface;


class BookController extends AbstractController
{
  /**
   * @Route("/book")
   */
  public function index(SessionInterface $session)
  {
    $imie = $session->get('imie');
    $nazwisko = $session->get('nazwisko');
    $logged = $session->get('logged');

    return $this->render('book.html.twig', [
      'imie' => $imie, 'nazwisko' => $nazwisko, 'logged' => $logged
    ]);
  }



  /*public function id($id)
  {
    $repository = $this->getDoctrine()->getRepository(Turysta::class);
    $turysta = $repository->findOneByIdTu($id);
    
    return $this->render('book.html.twig', [
      'imie' => $turysta->getImie(), 
      'nazwisko' => $turysta->getNazwisko()
      ]);
  }*/
}