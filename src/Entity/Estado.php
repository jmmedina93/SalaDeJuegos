<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
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
     * @ORM\OneToMany(targetEntity="App\Entity\Solicitud", mappedBy="estado")
     */
    private $solicitud;

    public function __construct()
    {
        $this->solicitud = new ArrayCollection();
    }

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

    /**
     * @return Collection|Solicitud[]
     */
    public function getSolicitud(): Collection
    {
        return $this->solicitud;
    }

    public function addSolicitud(Solicitud $solicitud): self
    {
        if (!$this->solicitud->contains($solicitud)) {
            $this->solicitud[] = $solicitud;
            $solicitud->setEstado($this);
        }

        return $this;
    }

    public function removeSolicitud(Solicitud $solicitud): self
    {
        if ($this->solicitud->contains($solicitud)) {
            $this->solicitud->removeElement($solicitud);
            // set the owning side to null (unless already changed)
            if ($solicitud->getEstado() === $this) {
                $solicitud->setEstado(null);
            }
        }

        return $this;
    }
}
