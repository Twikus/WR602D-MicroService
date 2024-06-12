<?php
namespace App\Controller;

use App\Service\UrlToPdf\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

class GotenbergController extends AbstractController
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    #[Route('/url-to-pdf', name: 'app_url-to-pdf', methods: ['GET'])]
    public function urlToPdf(Request $request): Response
    {
        // get the url from the params 
        $url = $request->query->get('url');
        $pdf = $this->apiService->urlToPdf($url);

        return new Response(
            $pdf,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'. uniqid() .'.pdf"'
            ]
        );
    }

    #[Route('/html-to-pdf', name: 'app_html-to-pdf', methods: ['POST'])]
    public function htmlToPdf(Request $request, LoggerInterface $logger): Response
    {
        // get the html from the request body
        $html = $request->getContent();
        $logger->info($html);
        $pdf = $this->apiService->htmlToPdf($html);

        return new Response(
            $pdf,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'. uniqid() .'.pdf"'
            ]
        );
    }

    #[Route('/markdown-to-pdf', name: 'app_markdown-to-pdf', methods: ['POST'])]
    public function markdownToPdf(Request $request): Response
    {
        // get the markdown from the request body
        $markdown = $request->getContent();
        $pdf = $this->apiService->markdownToPdf($markdown);

        return new Response(
            $pdf,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'. uniqid() .'.pdf"'
            ]
        );
    }
}