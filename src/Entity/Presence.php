<?php

namespace App\Entity;

use App\Repository\PresenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresenceRepository::class)
 */
class Presence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="presences")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Sortie::class, inversedBy="presences")
     */
    private $sorties;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getSorties(): ?Sortie
    {
        return $this->sorties;
    }

    public function setSorties(?Sortie $sorties): self
    {
        $this->sorties = $sorties;

        return $this;
    }
}
