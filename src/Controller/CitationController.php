<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CitationService;

#[Route('/citation', name: 'app_citation_')]
final class CitationController extends AbstractController
{
    private Citationservice $citationService;
    public function __construct(CitationService $citationService)
    {
        $this->citationService = $citationService;
    }
    #[Route('/list', name: 'list', methods: ['GET'])]
    public function index(): Response
    {
        $citations = $this->citationService->getAllCitations();
        return $this->render('citation/index.html.twig', [
            'controller_name' => 'CitationController',
            'citations' => $citations,
        ]);
    }
}
