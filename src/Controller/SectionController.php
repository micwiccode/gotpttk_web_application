<?php

namespace App\Controller;

use App\Entity\MountainGroup;
use App\Entity\Section;
use App\Entity\Point;
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
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    return $this->render('findSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
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
    return $this->render(
      'findSectionIdGroup.html.twig',
      array('mountainGroup' => $mountainGroup, 'endPoints' => $endPoints, 'startPoints' => $startPoints, 'logged' => $logged)
    );
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

  /**
   * @Route("/addSection", methods={"GET"})
   */
  public function addSection(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    $request = Request::createFromGlobals();
    return $this->render('addSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
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
   * @Route("/createOwnSection", methods="POST")
   */
  public function createOwnSectionSave(SessionInterface $session)
  {
    $request = Request::createFromGlobals();
    $sectionBegin = $request->request->get('section_begin');
    $sectionEnd = $request->request->get('section_end');
    $sectionGroupId = $request->request->get('section_group');
    $sectionLength = $request->request->get('section_length');
    $sectionHeight = $request->request->get('section_height');
    if(!($sectionBegin && $sectionEnd && $sectionGroupId && $sectionLength && $sectionHeight)){
      return $this->forward('App\Controller\SectionController::createOwnSection', array('error'=>true));
    }
    $sectionBegin = filter_var($sectionBegin, FILTER_SANITIZE_STRING);
    $sectionEnd = filter_var($sectionEnd, FILTER_SANITIZE_STRING);
    $sectionLength = filter_var($sectionLength, FILTER_VALIDATE_INT);
    $sectionHeight = filter_var($sectionHeight, FILTER_VALIDATE_INT);
    $entityManager = $this->getDoctrine()->getManager();
    $pointsGOT = floor($sectionLength/1000) + floor($sectionHeight/100);
    
    $startPoint = new Point();
    $startPoint->setName($sectionBegin);
    $endPoint = new Point();
    $endPoint->setName($sectionEnd);
    $group = $entityManager->getRepository(MountainGroup::class)->find($sectionGroupId);
    $section = new Section(0, $pointsGOT, $sectionLength, $sectionHeight, $startPoint, $endPoint, true, $group);

    $entityManager->persist($startPoint);
    $entityManager->persist($endPoint);
    $entityManager->persist($section);
    $entityManager->flush();
    $session->set('ownSectionId', $section->getIdS());
    return $this->redirectToRoute('trailsView', array('ownSection' => $section), 307);
  }

  /**
   * @Route("/createOwnSection")
   */
  public function createOwnSection(SessionInterface $session, $error=false)
  {
    $logged = $session->get('logged');
    $mountainGroups = $this->getDoctrine()->getRepository(MountainGroup::class)->findAll();
    if ($error){
      return $this->render('createOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged, 'alertEmptyFields' => true));
    }
    else return $this->render('createOwnSection.html.twig', array('mountainGroups' => $mountainGroups, 'logged' => $logged));
  }
}
