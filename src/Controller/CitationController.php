<?php

namespace App\Controller;

use App\Entity\Citation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CitationService;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CitationType;

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

    #[Route('/add', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request, Citationservice $citationService): Response
    {
        $citation = new Citation();

        $form = $this->createForm(
            CitationType::class,
            $citation,
        );

        $form->handleRequest($request);
        $citation->setCreatedAt(new \DateTimeImmutable());
        if ($form->isSubmitted() && $form->isValid()) {

            $citationService->add($citation);

            $this->addFlash(
                'success',
                'La citation a été ajouté avec succès.'
            );

            return $this->redirectToRoute(
                'app_citations_show',
                ['id' => $citation->getId()]
            );
        }

        return $this->render('citation/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Citationservice $citationService, int $id): Response
    {
        $citation = $this->citationService->getCitationById($id);
        $form = $this->createForm(
            CitationType::class,
            $citation
        );

        $form->handleRequest($request);
        $citation->setCreatedAt(new \DateTimeImmutable());
        if ($form->isSubmitted() && $form->isValid()) {

            $citationService->add($citation);

            $this->addFlash(
                'success',
                'La citation a été ajouté avec succès.'
            );

            return $this->redirectToRoute(
                'app_citations_show',
                ['id' => $citation->getId()]
            );
        }

        return $this->render('citation/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/del/{id}', name: 'del', methods: ['POST'])]
    public function del(int $id): Response
    {
        $this->citationService->delete($id);
        return $this->redirectToRoute('app_citations_list');
    }
}
