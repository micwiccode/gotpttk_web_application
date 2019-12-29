<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ResetPasswordController extends AbstractController
{
  /**
   * @Route("/resetPassword")
   */
  public function index()
  {
    return $this->render('resetPassword.html.twig');
  }
}