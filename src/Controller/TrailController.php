<?php

namespace App\Controller;

use App\Entity\Tourist;
use App\Entity\Section;
use App\Entity\SectionTrail;
use App\Entity\Trail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Session\SessionInterface;


class TrailController extends AbstractController{
  /**
   * @Route("/createRoute")
   */
  public function index(){
    $routes = ["Point1", "Point2"];
    return $this->render('createRoute.html.twig', array('routes' => $routes));
  }

  /**
   * @Route("/routeList")
   */
  public function list(SessionInterface $session){
    $idTu = $session->get('id');
    $logged = $session->get('logged');

    $doctrine = $this->getDoctrine();
    $idB = $doctrine->getRepository(Tourist::class)->findOneByIdTu($idTu)->getIdB();
    $trails = $doctrine->getRepository(Trail::class)->findByIdBook($idB);
    $sectionsTrails = array();
    $sections = array();

    foreach($trails as $trail){
      $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trail->getIdT());
      foreach($sectionsTrail as $sectionTrail){
        array_push($sections, $sectionTrail->getIdS());
      }
      array_push($sectionsTrails, $sectionsTrail);
    }

    /*$sections = array();
    foreach($sectionsTrails as $sectionsTrail){
      $sectiones = $doctrine->getRepository(Section::class)->findByIdS(1);
      array_push($sections, $sectiones);
    }*/
    return $this->render('routeList.html.twig', [
      'logged' => $logged, 
      'trails' => $trails, 
      'sections' => $sections
      ]);
  }


}
