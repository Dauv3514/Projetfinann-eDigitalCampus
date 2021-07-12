<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $extrait;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreationarticle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $miseajourcreationarticle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getExtrait(): ?string
    {
        return $this->extrait;
    }

    public function setExtrait(string $extrait): self
    {
        $this->extrait = $extrait;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDatecreationarticle(): ?\DateTimeInterface
    {
        return $this->datecreationarticle;
    }

    public function setDatecreationarticle(\DateTimeInterface $datecreationarticle): self
    {
        $this->datecreationarticle = $datecreationarticle;

        return $this;
    }

    public function getMiseajourcreationarticle(): ?\DateTimeInterface
    {
        return $this->miseajourcreationarticle;
    }

    public function setMiseajourcreationarticle(\DateTimeInterface $miseajourcreationarticle): self
    {
        $this->miseajourcreationarticle = $miseajourcreationarticle;

        return $this;
    }
}
