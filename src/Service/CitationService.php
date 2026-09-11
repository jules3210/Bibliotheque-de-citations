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

    public function getCitationById(int $id)
    {
        return $this->citationRepository->findOneBy( ["id"=>$id]);
    }

    public function add(Citation $citation): void
    {
        $this->entityManager->persist($citation);
        $this->entityManager->flush();
    }
}
