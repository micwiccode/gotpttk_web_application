<?php

namespace App\Controller;

use App\Entity\Tourist;
use App\Entity\Section;
use App\Entity\Book;
use App\Entity\SectionTrail;
use App\Entity\Trail;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class TrailController extends AbstractController
{

  /**
   * @Route("/createTrail", methods={"POST"})
   */
  public function indexWithPost(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $request = Request::createFromGlobals();

    $date = $request->request->get('date');
    if($date){
      $session->set('date', $date);
    }else{
      $date = $session->get('date');
    }

    $idS = $request->request->get('idS');
    $deleteSectionId = $request->request->get('deleteSectionId');
    $entityManager = $this->getDoctrine()->getManager();

    if ($logged) {
      if ($idS) {
        $idT = $session->get('currentTrailId');
        $trail = $entityManager->getRepository(Trail::class)->find($idT);
        $section = $entityManager->getRepository(Section::class)->find($idS);
        if(!$entityManager->getRepository(SectionTrail::class)->findOneBy(['idT'=> $trail, 'idS' => $section])){
          $this->createNewSectionTrail($trail, $section);
        }
        [$sections, $sumOfPoints] = $this->getData($idT);
        return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints));
      }

      else if ($deleteSectionId) {
        $idT = $session->get('currentTrailId');
        $deleteSectionTrail = $entityManager->getRepository(SectionTrail::class)->findOneBy(['idT'=> $idT, 'idS' => $deleteSectionId]);
        $entityManager->remove($deleteSectionTrail);
        $entityManager->flush();
        [$sections, $sumOfPoints] = $this->getData($idT);
        return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date, 'sections' => $sections, 'sumOfPoints' => $sumOfPoints));
      }

      else{
        $this->createNewTrail($session, $trail);
        $session->set('currentTrailId', $trail->getIdT());
      }
    }
    return $this->render('createTrail.html.twig', array('logged' => $logged, 'date' => $date));
  }

  /**
   * @Route("/createTrail")
   */
  public function index(SessionInterface $session)
  {
    $logged = $session->get('logged');
    return $this->render('createTrail.html.twig', array('logged' => $logged));
  }

  /**
   * @Route("/trailsList")
   */
  public function list(SessionInterface $session)
  {
    $logged = $session->get('logged');
    $idB = $session->get('idB');

    $doctrine = $this->getDoctrine();
    $trails = $doctrine->getRepository(Trail::class)->findByIdBook($idB);

    $dates = array();
    $allTrails = array();

    foreach($trails as $trail){
      array_push($dates, $trail->getTrailDateString());
      $allSectionsTrail = array();
      $sectionsTrail = $doctrine->getRepository(SectionTrail::class)->findByIdT($trail->getIdT());
      
      foreach($sectionsTrail as $sectionTrail){
        array_push($allSectionsTrail, $sectionTrail->getIdS());
      }
      array_push($allTrails, $allSectionsTrail);
    }

    return $this->render('trailsList.html.twig', [
      'logged' => $logged,
      'dates' => $dates,
      'allTrails' => $allTrails
    ]);
  }

  private function getData($idT)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $currentTrailSections = $entityManager->getRepository(SectionTrail::class)->findBy(['idT' => $idT]);
    $sections = array();
    $sumOfPoints = 0;
    foreach ($currentTrailSections as $currentTrailSection) {
      array_push($sections, $currentTrailSection->getIdS());
      $sumOfPoints += $currentTrailSection->getIdS()->getPointsGOT();
    }
    return array($sections, $sumOfPoints);
  }

  private function createNewSectionTrail($trail, $section)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $sectionTrail = new SectionTrail($trail, $section);
    $entityManager->persist($sectionTrail);
    $entityManager->flush();
  }

  private function createNewTrail($session, $date)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $idB = $session->get('idB');
    $book = $entityManager->getRepository(Book::class)->find($idB);
    $trail = new Trail(0, false, false, false, date_create($date), $book);
    $entityManager->persist($trail);
    $entityManager->flush();
  }
}
