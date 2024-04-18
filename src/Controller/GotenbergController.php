<?php
namespace App\Controller;

use App\Service\HtmlToPdf\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GotenbergController extends AbstractController
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    #[Route('/htmltopdf', name: 'app_htmltopdf', methods: ['POST'])]
    public function index(Request $request): Response
    {
        $html = $request->getContent();

        $pdf = $this->apiService->sendHtmlToGotenberg($html);

        $response = new Response($pdf);
        $response->headers->set('Content-Type', 'application/pdf');

        return $response;
    }
}