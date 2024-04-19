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

    #[Route('/url-to-pdf', name: 'app_url_to_pdf', methods: ['POST'])]
    public function urlToPdf(Request $request): Response
    {
        $url = $request->request->get('url');
        $result = $this->apiService->urlToPdf($url);

        return new Response($result);
    }
}