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

    public function getAllCitations()
    {
        return $this->citationRepository->findAllCitations();
    }
}
