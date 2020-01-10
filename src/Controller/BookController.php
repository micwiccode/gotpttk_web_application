<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Tourist;
use App\Entity\BookDegree;
use App\Entity\Degree;
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
    $idB = $this->getDoctrine()->getRepository(Tourist::class)->findOneByIdTu($session->get('id'))->getIdB();
    $session->set('idB', $idB);
    $bookDegrees = $this->getDoctrine()->getRepository(BookDegree::class)->findByIdB($idB);

    $degree = new Degree(0,0);
    foreach($bookDegrees as $bookDegree){
      $degree = $bookDegree->getIdD();  
    }
    $degreeName = $degree->getName();

    return $this->render('book.html.twig', [
      'imie' => $imie, 'nazwisko' => $nazwisko, 'logged' => $logged, 'degree' => $degreeName
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
