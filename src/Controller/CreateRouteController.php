<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CreateRouteController extends AbstractController
{
  /**
   * @Route("/createRoute")
   */
  public function index(){
    $route = ["Point1", "Point2"];
    return $this->render('createRoute.html.twig', array('route' => $route));
  }
}
