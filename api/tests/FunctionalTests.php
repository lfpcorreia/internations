<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTests extends WebTestCase {

    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSecure($url) {
        $client = self::createClient([], [
            'PHP_AUTH_USER' => 'test',
            'PHP_AUTH_PW'   => 'incorrect_pw',
        ]);
        $client->request('GET', $url);
        $this->assertFalse($client->getResponse()->isSuccessful());
    }

    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url) {
        $client = self::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'internations',
        ]);
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider() {
        // yield ['/'];
        yield ['/inter_users'];
        yield ['/inter_groups'];
    }
}
