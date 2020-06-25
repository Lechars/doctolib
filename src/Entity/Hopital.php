<?php

namespace App\Entity;

use App\Repository\HopitalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HopitalRepository::class)
 */
class Hopital
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarif;

    /**
     * @ORM\ManyToOne(targetEntity=Pay::class, inversedBy="hopitals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pay;

    /**
     * @ORM\OneToMany(targetEntity=Soin::class, mappedBy="hopital")
     */
    private $soin;

    public function __construct()
    {
        $this->soin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(string $gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getTarif(): ?int
    {
        return $this->tarif;
    }

    public function setTarif(int $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getPay(): ?Pay
    {
        return $this->pay;
    }

    public function setPay(?Pay $pay): self
    {
        $this->pay = $pay;

        return $this;
    }

    /**
     * @return Collection|soin[]
     */
    public function getSoin(): Collection
    {
        return $this->soin;
    }

    public function addSoin(soin $soin): self
    {
        if (!$this->soin->contains($soin)) {
            $this->soin[] = $soin;
            $soin->setHopital($this);
        }

        return $this;
    }

    public function removeSoin(soin $soin): self
    {
        if ($this->soin->contains($soin)) {
            $this->soin->removeElement($soin);
            // set the owning side to null (unless already changed)
            if ($soin->getHopital() === $this) {
                $soin->setHopital(null);
            }
        }

        return $this;
    }
}
