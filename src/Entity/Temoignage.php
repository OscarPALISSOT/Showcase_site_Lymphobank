<?php

namespace App\Entity;

use App\Repository\TemoignageRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemoignageRepository::class)
 */
class Temoignage
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
    private $temoin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metierTemoin;

    /**
     * @ORM\Column(type="text")
     */
    private $temoignage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemoin(): ?string
    {
        return $this->temoin;
    }

    public function setTemoin(string $temoin): self
    {
        $this->temoin = $temoin;

        return $this;
    }

    public function getMetierTemoin(): ?string
    {
        return $this->metierTemoin;
    }

    public function setMetierTemoin(string $metierTemoin): self
    {
        $this->metierTemoin = $metierTemoin;

        return $this;
    }

    public function getTemoignage(): ?string
    {
        return $this->temoignage;
    }

    public function setTemoignage(string $temoignage): self
    {
        $this->temoignage = $temoignage;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
