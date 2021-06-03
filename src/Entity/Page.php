<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="idPage", type="integer")
     */
    private $idPage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $page;


    public function getIdPage(): ?int
    {
        return $this->idPage;
    }

    public function setIdPage(int $idPage): self
    {
        $this->idPage = $idPage;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }

}
