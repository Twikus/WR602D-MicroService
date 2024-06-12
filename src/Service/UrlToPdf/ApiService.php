<?php
namespace App\Service\UrlToPdf;

use Symfony\Component\HttpClient\HttpClient;

class ApiService
{
    public function urlToPdf(string $url): string
    {
        $client = HttpClient::create();
        $gotenbergUrl = $_ENV['GOTENBERG_URL'];
        $response = $client->request('POST', $gotenbergUrl.'/forms/chromium/convert/url', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'url' => $url,
            ],
        ]);

        return $response->getContent();
    }

    public function htmlToPdf(string $html): string
    {
        $client = HttpClient::create();
        $gotenbergUrl = $_ENV['GOTENBERG_URL'];
        $response = $client->request('POST', $gotenbergUrl.'/forms/chromium/convert/html', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'html' => $html,
            ],
        ]);

        return $response->getContent();
    }

    public function markdownToPdf(string $markdown): string
    {
        $client = HttpClient::create();
        $gotenbergUrl = $_ENV['GOTENBERG_URL'];
        $response = $client->request('POST', $gotenbergUrl.'/forms/chromium/convert/markdown', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'markdown' => $markdown,
            ],
        ]);

        return $response->getContent();
    }
}