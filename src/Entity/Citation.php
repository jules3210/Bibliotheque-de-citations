<?php

namespace App\Entity;

use App\Repository\CitationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CitationRepository::class)]
class Citation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $texte = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Votre auteur doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre auteur ne peut pas dépasser {{ limit }} caractères.',
    )]
    private ?string $auteur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre source doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre source ne peut pas dépasser {{ limit }} caractères.',
    )]
    private ?string $source = null;

    #[ORM\Column(nullable: true)]

    private ?int $annee_citation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contexte = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: 'Votre lieu doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre lieu ne peut pas dépasser {{ limit }} caractères.',
    )]
    private ?string $lieu = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 150,
        minMessage: 'Votre type de citation doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Votre type de citation ne peut pas dépasser {{ limit }} caractères.',
    )]
    private ?string $type_citation = null;

    #[ORM\Column]
    private ?int $nbr_vues = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getAnneeCitation(): ?int
    {
        return $this->annee_citation;
    }

    public function setAnneeCitation(?int $annee_citation): static
    {
        $this->annee_citation = $annee_citation;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->contexte;
    }

    public function setContexte(?string $contexte): static
    {
        $this->contexte = $contexte;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getTypeCitation(): ?string
    {
        return $this->type_citation;
    }

    public function setTypeCitation(string $type_citation): static
    {
        $this->type_citation = $type_citation;

        return $this;
    }

    public function getNbrVues(): ?int
    {
        return $this->nbr_vues;
    }

    public function setNbrVues(int $nbr_vues): static
    {
        $this->nbr_vues = $nbr_vues;

        return $this;
    }
}
