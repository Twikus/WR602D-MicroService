<?php

namespace App\Tests\Service\HtmlToPdf;

use App\Service\UrlToPdf\ApiService;
use PHPUnit\Framework\TestCase;

class ApiServiceTest extends TestCase
{
    public function testSendHtmlToGotenberg()
    {
        $url = "http://google.com";
        $expectedPdfContent = "PDF content";

        // Créer un mock de ApiService
        $apiService = $this->createMock(ApiService::class);

        // Configurer le mock pour retourner le contenu PDF attendu
        $apiService->method('urlToPdf')
            ->willReturn($expectedPdfContent);

        $pdfContent = $apiService->urlToPdf($url);

        $this->assertEquals($expectedPdfContent, $pdfContent, "The returned PDF content should match the expected content.");
    }
}