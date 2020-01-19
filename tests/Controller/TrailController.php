<?php

namespace App\Tests\Controller;

use App\Entity\Section;
use App\Entity\Point;
use App\Entity\MountainGroup;
use App\Controller\TrailController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class Trail extends TestCase
{
  /**
   * Test for isTrailValid function
   * @return void
   */
  public function testIsTrailValid()
  {
    $trailController = new TrailController();
    $session = new Session(new MockArraySessionStorage());

    $startPoint = new Point();
    $startPoint->setName('Kozi Wierch');
    $endPoint = new Point();
    $endPoint->setName('Smocza Jama');
    $mountainGroup = new MountainGroup(11, 'TATRY WYSOKIE', 'T.01');

    $sectionsArray = array();
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    $section1 = new Section(1, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(2, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(3, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);

    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(true, $result);

    $section1 = new Section(11, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(11, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(11, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);

    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    $section1 = new Section(12, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(28, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(28, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);

    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    $section1 = new Section(15, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(15, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(16, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);

    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);

    $section1 = new Section(10, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section2 = new Section(99, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);
    $section3 = new Section(10, 12, 120, 240, $startPoint, $endPoint, true, $mountainGroup);

    $sectionsArray = array($section1, $section2, $section3);
    $session->set('currentSectionsArray', $sectionsArray);

    $result = $trailController->isTrailValid($session);
    $this->assertEquals(false, $result);
  }
}