<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SectionController extends AbstractController
{
  /**
   * @Route("/findSection")
   */
  public function findSection()
  {
    return $this->render('findSection.html.twig');
  }

  /**
   * @Route("/addSection")
   */
  public function addSection()
  {
    $start_points = ["Point1", "Point2"];
    return $this->render('addSection.html.twig', array('start_points' => $start_points));
  }

  /**
   * @Route("/findSection/idGroup")
   */
  public function findSectionIdGroup()
  {
    return $this->render('findSectionIdGroup.html.twig');
  }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection()
  {
    return $this->render('createOwnSection.html.twig');
  }
}
