<?php

namespace backBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfoControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/info/lister');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/info/ajouter');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/info/modifier');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/info/supprimer');
    }

}
