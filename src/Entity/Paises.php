<?php

namespace App\Entity;

use App\Repository\PaisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaisesRepository::class)
 */
class Paises
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
    private $nombre_pais;

    /**
     * @ORM\OneToMany(targetEntity=Direcciones::class, mappedBy="pais")
     */
    private $direcciones;

    public function __construct()
    {
        $this->direcciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombrePais(): ?string
    {
        return $this->nombre_pais;
    }

    public function setNombrePais(string $nombre_pais): self
    {
        $this->nombre_pais = $nombre_pais;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre_pais;
    }

    /**
     * @return Collection|Direcciones[]
     */
    public function getDirecciones(): Collection
    {
        return $this->direcciones;
    }

    public function addDireccione(Direcciones $direccione): self
    {
        if (!$this->direcciones->contains($direccione)) {
            $this->direcciones[] = $direccione;
            $direccione->setPais($this);
        }

        return $this;
    }

    public function removeDireccione(Direcciones $direccione): self
    {
        if ($this->direcciones->removeElement($direccione)) {
            // set the owning side to null (unless already changed)
            if ($direccione->getPais() === $this) {
                $direccione->setPais(null);
            }
        }

        return $this;
    }
}
