<?php

namespace App\Entity;

use DateTime;
use App\Repository\AdminsRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="admins")
 * @ORM\Entity(repositoryClass="App\Repository\AdminsRepository")
 */
class Admins implements UserInterface,\Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    public function __construct()
    {
        $this->created_at = new DateTime();
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        $roles[]= 'ROLE_ADMIN';
        return array_unique($roles);
    }

    public function setRoles($roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt()
    {
        return NULL;
    }


    public function eraseCredentials()
    {
        
    }

    public function serialize()
    {
        return serialize([
            $this->username,
            $this->password
        ]);
    }


    public function unserialize($serialized)
    {
        list(
            $this->username,
            $this->password
        ) = unserialize($serialized, ['allowed_classes' => false]);
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
