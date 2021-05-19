<?php

namespace App\Entity;

use App\Repository\ClientesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientesRepository::class)
 */
class Clientes
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
    private $identificacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_cliente;

    /**
     * @ORM\OneToMany(targetEntity=Direcciones::class, mappedBy="cliente")
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

    public function getIdentificacion(): ?string
    {
        return $this->identificacion;
    }

    public function setIdentificacion(string $identificacion): self
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    public function getNombreCliente(): ?string
    {
        return $this->nombre_cliente;
    }

    public function setNombreCliente(string $nombre_cliente): self
    {
        $this->nombre_cliente = $nombre_cliente;

        return $this;
    }

    public function getApellidoCliente(): ?string
    {
        return $this->apellido_cliente;
    }

    public function setApellidoCliente(string $apellido_cliente): self
    {
        $this->apellido_cliente = $apellido_cliente;

        return $this;
    }

    public function getEmailCliente(): ?string
    {
        return $this->email_cliente;
    }

    public function setEmailCliente(string $email_cliente): self
    {
        $this->email_cliente = $email_cliente;

        return $this;
    }

    public function __toString()
    {
        return "$this->nombre_cliente"." "."$this->apellido_cliente";
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
            $direccione->setCliente($this);
        }

        return $this;
    }

    public function removeDireccione(Direcciones $direccione): self
    {
        if ($this->direcciones->removeElement($direccione)) {
            // set the owning side to null (unless already changed)
            if ($direccione->getCliente() === $this) {
                $direccione->setCliente(null);
            }
        }

        return $this;
    }
}
