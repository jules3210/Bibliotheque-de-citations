<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CitationService;

#[Route('/citations', name: 'app_citations_')]
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
            'citations' => $citations,
        ]);
    }

    #[Route('/show/{id}', name: 'show', methods: ['GET'])]
    public function show($id): Response
    {
        $citation = $this->citationService->getCitationById($id);
        return $this->render('citation/show.html.twig', [
            'citation' => $citation,
        ]);
    }
}
