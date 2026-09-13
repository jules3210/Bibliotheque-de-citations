<?php

namespace App\Service;

use App\Repository\CitationRepository;
use App\Entity\Citation;
use Doctrine\ORM\EntityManagerInterface;

class CitationService
{
    private CitationRepository $citationRepository;

    public function __construct(
        CitationRepository $citationRepository,
        private EntityManagerInterface $entityManager)
    {
        $this->citationRepository = $citationRepository;
        $this->entityManager = $entityManager;
    }

    public function getAllCitations(): array
    {
        return $this->citationRepository->findAllCitations();
    }

    public function getCitation(int $id)
    {
        $this->citationRepository->addOneToNbrVues($id);
        return $this->citationRepository->find($id);
    }

    public function add(Citation $citation): void
    {
        $this->entityManager->persist($citation);
        $this->entityManager->flush();
    }

    public function delete(int $id): void
    {
        $this->citationRepository->deleteOnById($id);
    }
}
