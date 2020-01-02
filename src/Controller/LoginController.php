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

  /**
   * @Route("/resetPassword")
   */
  public function resetPassword()
  {
    return $this->render('resetPassword.html.twig');
  }
}