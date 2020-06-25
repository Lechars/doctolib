<?php

namespace App\Entity;

use App\Repository\SoinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoinRepository::class)
 */
class Soin
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
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $duréeTraitement;

    /**
     * @ORM\Column(type="integer")
     */
    private $dureeHospitalisation;

    /**
     * @ORM\ManyToOne(targetEntity=Hopital::class, inversedBy="soin")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hopital;

    /**
     * @ORM\OneToMany(targetEntity=Medecin::class, mappedBy="soin")
     */
    private $medecins;

    public function __construct()
    {
        $this->Medecins = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuréeTraitement(): ?int
    {
        return $this->duréeTraitement;
    }

    public function setDuréeTraitement(int $duréeTraitement): self
    {
        $this->duréeTraitement = $duréeTraitement;

        return $this;
    }

    public function getDureeHospitalisation(): ?int
    {
        return $this->dureeHospitalisation;
    }

    public function setDureeHospitalisation(int $dureeHospitalisation): self
    {
        $this->dureeHospitalisation = $dureeHospitalisation;

        return $this;
    }

    public function getHopital(): ?Hopital
    {
        return $this->hopital;
    }

    public function setHopital(?Hopital $hopital): self
    {
        $this->hopital = $hopital;

        return $this;
    }

    /**
     * @return Collection|medecin[]
     */
    public function getMedecins(): Collection
    {
        return $this->medecins;
    }

    public function addMedecin(medecin $medecin): self
    {
        if (!$this->medecins->contains($medecin)) {
            $this->medecins[] = $medecin;
            $medecin->setSoin($this);
        }

        return $this;
    }

    public function removeMedecin(medecin $medecin): self
    {
        if ($this->medecins->contains($medecin)) {
            $this->medecins->removeElement($medecin);
            // set the owning side to null (unless already changed)
            if ($medecin->getSoin() === $this) {
                $medecin->setSoin(null);
            }
        }

        return $this;
    }
}
