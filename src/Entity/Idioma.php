<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IdiomaRepository")
 */
class Idioma
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="idioma")
     */
    private $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Usuario[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Usuario $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
            $name->setIdioma($this);
        }

        return $this;
    }

    public function removeName(Usuario $name): self
    {
        if ($this->name->contains($name)) {
            $this->name->removeElement($name);
            // set the owning side to null (unless already changed)
            if ($name->getIdioma() === $this) {
                $name->setIdioma(null);
            }
        }

        return $this;
    }
}
