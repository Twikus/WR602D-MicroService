<?php

namespace App\Tests\Service\HtmlToPdf;

use App\Service\HtmlToPdf\ApiService;
use PHPUnit\Framework\TestCase;

class ApiServiceTest extends TestCase
{
    public function testSendHtmlToGotenberg()
    {
        $html = "<html><body>Hello World</body></html>";
        $expectedPdfContent = "PDF_CONTENT";

        // Créer un mock de ApiService
        $apiService = $this->createMock(ApiService::class);

        // Configurer le mock pour retourner le contenu PDF attendu
        $apiService->method('sendHtmlToGotenberg')
            ->willReturn($expectedPdfContent);

        $pdfContent = $apiService->sendHtmlToGotenberg($html);

        $this->assertEquals($expectedPdfContent, $pdfContent, "The returned PDF content should match the expected content.");
    }
}