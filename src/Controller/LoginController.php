<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController
{
  /**
   * @Route("/login")
   */
  public function index()
  {
    return $this->render('login.html.twig');
  }
}