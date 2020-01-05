<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AlertController extends AbstractController
{
  /**
   * @Route("/alert")
   */
  public function index()
  {
    return $this->render('alert.html.twig');
  }
}