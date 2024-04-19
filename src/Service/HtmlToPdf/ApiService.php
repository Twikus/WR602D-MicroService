<?php
namespace App\Service\HtmlToPdf;

use Symfony\Component\HttpClient\HttpClient;

class ApiService
{
    public function urlToPdf(string $url): string
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://gotenberg:3000/convert/url', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'url' => $url,
            ],
        ]);

        return $response->getContent();
    }
}