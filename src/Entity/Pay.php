<?php

namespace App\Entity;

use App\Repository\PayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PayRepository::class)
 */
class Pay
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
     * @ORM\OneToMany(targetEntity=Hopital::class, mappedBy="pay")
     */
    private $hopitals;

    public function __construct()
    {
        $this->hopitals = new ArrayCollection();
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
     * @return Collection|Hopital[]
     */
    public function getHopitals(): Collection
    {
        return $this->hopitals;
    }

    public function addHopital(Hopital $hopital): self
    {
        if (!$this->hopitals->contains($hopital)) {
            $this->hopitals[] = $hopital;
            $hopital->setPay($this);
        }

        return $this;
    }

    public function removeHopital(Hopital $hopital): self
    {
        if ($this->hopitals->contains($hopital)) {
            $this->hopitals->removeElement($hopital);
            // set the owning side to null (unless already changed)
            if ($hopital->getPay() === $this) {
                $hopital->setPay(null);
            }
        }

        return $this;
    }
}
