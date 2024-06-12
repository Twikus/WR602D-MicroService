<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpClient\HttpClient;
use PHPUnit\Framework\TestCase;

class GotenbergControllerTest extends TestCase
{
    public function testUrlToPdf()
    {
        $client = HttpClient::create();

        // Assurez-vous que cette URL est correcte et que le serveur est en cours d'exécution
        $response = $client->request('POST', 'http://localhost:8000/url-to-pdf', [
            'body' => [
                'url' => 'https://www.google.com',
            ],
        ]);

        // Si vous recevez toujours un code 404, vous pouvez utiliser cette ligne pour afficher la réponse
        // et aider à déboguer le problème
        var_dump($response->getContent());

        $this->assertEquals(200, $response->getStatusCode(), "The status code should be 200.");
    }
}