<?php
namespace App\Service\HtmlToPdf;

use Symfony\Component\HttpClient\HttpClient;

class ApiService
{
    public function sendHtmlToGotenberg(string $html): string
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://localhost:3000/forms/chromium/convert/html', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'files' => $html,
            ],
        ]);

        // Vérifiez le statut de la réponse
        if ($response->getStatusCode() != 200) {
            throw new \Exception('Erreur lors de la conversion du HTML en PDF : ' . $response->getContent(false));
        }

        return $response->getContent();
    }
}