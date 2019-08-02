<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CentroRepository")
 */
class Centro
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
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $n_salas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="centro")
     */
    private $usuario;

    public function __construct()
    {
        $this->usuario = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNSalas(): ?int
    {
        return $this->n_salas;
    }

    public function setNSalas(int $n_salas): self
    {
        $this->n_salas = $n_salas;

        return $this;
    }

    /**
     * @return Collection|Usuario[]
     */
    public function getUsuario(): Collection
    {
        return $this->usuario;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuario->contains($usuario)) {
            $this->usuario[] = $usuario;
            $usuario->setCentro($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuario->contains($usuario)) {
            $this->usuario->removeElement($usuario);
            // set the owning side to null (unless already changed)
            if ($usuario->getCentro() === $this) {
                $usuario->setCentro(null);
            }
        }

        return $this;
    }
}
