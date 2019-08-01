<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Roles", inversedBy="usuario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Idioma", inversedBy="name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idioma;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Solicitud", mappedBy="usuario", cascade={"persist", "remove"})
     */
    private $solicitud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRoles(): ?Roles
    {
        return $this->roles;
    }

    public function setRoles(?Roles $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getIdioma(): ?Idioma
    {
        return $this->idioma;
    }

    public function setIdioma(?Idioma $idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    public function getSolicitud(): ?Solicitud
    {
        return $this->solicitud;
    }

    public function setSolicitud(Solicitud $solicitud): self
    {
        $this->solicitud = $solicitud;

        // set the owning side of the relation if necessary
        if ($this !== $solicitud->getUsuario()) {
            $solicitud->setUsuario($this);
        }

        return $this;
    }
}
