<?php

namespace App\Controller;

use App\Entity\GrupaGorska;
use App\Entity\Odcinek;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends AbstractController
{
  /**
   * @Route("/findSection")
   */
  public function findSection()
  {
    $mountain_groups = $this->getDoctrine()->getRepository(GrupaGorska::class)->findAll();
    return $this->render('findSection.html.twig', array('mountain_groups' => $mountain_groups));
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
   * @Route("/findSection_group{id}")
   */
  public function findSectionIdGroup($id)
  {
    $doctrine = $this->getDoctrine();
    $mountainGroup = $doctrine->getRepository(GrupaGorska::class)->find($id);
    $endPoints = $doctrine->getRepository(Odcinek::class)->getDistinctEndPointsFromGroup($id);
    $startPoints = array();
    foreach ($endPoints as $endPoint) {
      $startPointsForEndPoint = $doctrine->getRepository(Odcinek::class)
      ->findBy(['punktKoncowy' => $endPoint->getPunktKoncowy()]);
      array_push($startPoints, $startPointsForEndPoint);
    }
    return $this->render('findSectionIdGroup.html.twig',
     array('mountainGroup'=> $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints));
  }

  /**
   * @Route("/findSection?section_name={name}&section_group={groupId}, methods={"GET"}")
   */
  // public function findSectionForm($name, $gropuId)
  // {
  //   return new Response('<html><body>$name<br>$gropuId</body></html>');
  //   // return $this->render('findSectionIdGroup.html.twig');
  // }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection()
  {
    return $this->render('createOwnSection.html.twig');
  }
}
