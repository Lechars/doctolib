<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedecinRepository::class)
 */
class Medecin
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
    private $nil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\ManyToOne(targetEntity=Soin::class, inversedBy="medecins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNil(): ?string
    {
        return $this->nil;
    }

    public function setNil(string $nil): self
    {
        $this->nil = $nil;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getSoin(): ?Soin
    {
        return $this->soin;
    }

    public function setSoin(?Soin $soin): self
    {
        $this->soin = $soin;

        return $this;
    }
}
