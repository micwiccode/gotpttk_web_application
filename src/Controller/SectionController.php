<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SectionController extends AbstractController
{
  /**
   * @Route("/findSection")
   */
  public function findSection()
  {
    $mountain_groups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
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
    $mountainGroup = $doctrine->getRepository(MountainGroup::class)->find($id);
    $endPoints = $doctrine->getRepository(Section::class)->getDistinctEndPointsFromGroup($id);
    $startPoints = array();
    foreach ($endPoints as $endPoint) {
      $startPointsForEndPoint = $doctrine->getRepository(Section::class)
      ->findBy(['endPoint' => $endPoint->getEndPoint()]);
      array_push($startPoints, $startPointsForEndPoint);
    }
    return $this->render('findSectionIdGroup.html.twig',
     array('mountainGroup'=> $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints));
  }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection()
  {
    return $this->render('createOwnSection.html.twig');
  }

  /**
   * @Route("/findSection_result", methods={"POST"})
   */
  public function findSectionForm()
  {
    $request = Request::createFromGlobals();

    $sectionName = $request->request->get('sectionName');
    $sectionGroup = $request->request->get('sectionGroup');
    $doctrine = $this->getDoctrine();
    $results = $doctrine->getRepository(Section::class)->findByNameAndGroup($sectionName, $sectionGroup);
    return $this->render('findSectionResult.html.twig', array('results' => $results));
  }
}
