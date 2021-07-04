<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $infospratique;

    /**
     * @ORM\ManyToOne(targetEntity=Sortie::class, inversedBy="information")
     */
    private $sortie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfospratique(): ?string
    {
        return $this->infospratique;
    }

    public function setInfospratique(string $infospratique): self
    {
        $this->infospratique = $infospratique;

        return $this;
    }

    public function getSortie(): ?Sortie
    {
        return $this->sortie;
    }

    public function setSortie(?Sortie $sortie): self
    {
        $this->sortie = $sortie;

        return $this;
    }
}
