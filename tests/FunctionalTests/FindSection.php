<?php

namespace App\Tests\FunctionalTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FindSectionTest extends WebTestCase
{
  public function testShowPost(){

    $client = static::createClient();
    $client->request('GET', 'findSection');
    $this->assertEquals(200, $client->getResponse()->getStatusCode());

    // $client->request('GET', $client->getContainer()->get('router')->generate('findSection_group1', array(), true));
    // $this->assertEquals(200, $client->getResponse()->getStatusCode());

    // $client->request('POST', $client->getContainer()->get('router')->generate('findSection_result', array(), true));
    // $this->assertEquals(200, $client->getResponse()->getStatusCode());

  }

  public function testCotent()
  {
    $client = static::createClient();
    $crawler = $client->request('GET', 'public/findSection');

    // $this->assertSelectorExists('html body div div h3');
    // $this->assertSelectorExists('html body div div form');
    // $this->assertSelectorExists('html body div div form div input');
    // $form = $crawler->selectButton('.form')->form();
    $this->assertGreaterThan(0, $crawler->filterXpath('/html/')->count());
    // $this->assertContains('Przeglądaj odcinki', $crawler->filter('html body div div h3')->text());

    // // set some values
    // $form['sectionName'] = 'a';
    // $form['sectionGroup'] = 1;

    // // submit the form
    // $crawler = $client->submit($form);
  }
}