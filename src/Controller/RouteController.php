<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class RouteController extends AbstractController{
  /**
   * @Route("/createRoute")
   */
  public function index(){
    $routes = ["Point1", "Point2"];
    return $this->render('createRoute.html.twig', array('routes' => $routes));
  }

  /**
   * @Route("/findSection")
   */
  public function findSection(){
    return $this->render('findSection.html.twig');
  }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection(){
    return $this->render('createOwnSection.html.twig');
  }
}
