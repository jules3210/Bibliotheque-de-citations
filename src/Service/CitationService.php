<?php

namespace App\Service;

use App\Repository\CitationRepository;

class CitationService
{
    private CitationRepository $citationRepository;
    public function __construct(CitationRepository $citationRepository)
    {
        $this->citationRepository = $citationRepository;
    }

    public function getAllCitations(): array
    {
        return $this->citationRepository->findAllCitations();
    }

    public function getCitationById(int $id)
    {
        return $this->citationRepository->findOneBy( ["id"=>$id]);
    }
}
