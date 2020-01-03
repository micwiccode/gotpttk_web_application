<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BookController extends AbstractController
{
  /**
   * @Route("/book")
   */
  public function index()
  {
    return $this->render('book.html.twig');
  }
}