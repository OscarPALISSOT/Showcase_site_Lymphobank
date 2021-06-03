<?php

namespace App\Entity;

use App\Repository\ParagrapheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParagrapheRepository::class)
 */
class Paragraphe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idPara;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordre;

    /**
     * @var \Page
     * 
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPage", referencedColumnName="idPage")
     * })
     */
    private $idPage;


    public function getIdPara(): ?int
    {
        return $this->idPara;
    }

    public function setIdPara(int $idPara): self
    {
        $this->idPara = $idPara;

        return $this;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getIdPage(): ?Page
    {
        return $this->idPage;
    }

    public function setIdPage(?Page $idPage): self
    {
        $this->idPage = $idPage;

        return $this;
    }

}
