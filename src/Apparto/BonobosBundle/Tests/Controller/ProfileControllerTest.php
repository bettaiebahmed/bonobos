<?php

namespace Apparto\BonobosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    public function testModify()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/profile');
    }

}
