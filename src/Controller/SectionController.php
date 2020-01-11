<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SectionController extends AbstractController
{
  /**
   * @Route("/findSection")
   */
  public function findSection(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $mountain_groups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    return $this->render('findSection.html.twig', array('mountain_groups' => $mountain_groups, 'logged' => $logged));
  }

  /**
   * @Route("/addSection_group{id}")
   */
  public function addSectionIdGroup($id, SessionInterface $session)
  {
    $logged = $session->get('logged');
    $doctrine = $this->getDoctrine();
    $mountainGroup = $doctrine->getRepository(MountainGroup::class)->find($id);
    $endPoints = $doctrine->getRepository(Section::class)->getDistinctEndPointsFromGroup($id);
    $startPoints = array();
    foreach ($endPoints as $endPoint) {
      $startPointsForEndPoint = $doctrine->getRepository(Section::class)
        ->findBy(['endPoint' => $endPoint->getEndPoint()]);
      array_push($startPoints, $startPointsForEndPoint);
    }
    return $this->render(
      'addSectionIdGroup.html.twig',
      array('mountainGroup' => $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints, 'logged' => $logged)
    );
  }

  /**
   * @Route("/addSection", methods={"GET"})
   */
  public function addSection(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $mountain_groups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    $request = Request::createFromGlobals();
    $currentTrailId = $request->request->get('currentTrailId');
    return $this->render('addSection.html.twig', array('mountain_groups' => $mountain_groups, 'logged' => $logged, 'currentTrailId'=> $currentTrailId));
  }

  /**
   * @Route("/findSection_group{id}")
   */
  public function findSectionIdGroup($id, SessionInterface $session)
  {
    $logged = $session->get('logged');
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
     array('mountainGroup'=> $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints, 'logged' => $logged));
  }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection(SessionInterface $session)
  {
    $logged = $session->get('logged');
    return $this->render('createOwnSection.html.twig', array('logged' => $logged));
  }

  /**
   * @Route("/findSection_result", methods={"POST"})
   */
  public function findSectionForm(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();
    $sectionName = $request->request->get('sectionName');
    $sectionGroup = $request->request->get('sectionGroup');
    $doctrine = $this->getDoctrine();
    $results = $doctrine->getRepository(Section::class)->findByNameAndGroup($sectionName, $sectionGroup);
    return $this->render('findSectionResult.html.twig', array('results' => $results, 'logged' => $logged));
  }
}
