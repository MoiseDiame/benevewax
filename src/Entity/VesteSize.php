<?php

namespace App\Entity;

use App\Repository\VesteSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VesteSizeRepository::class)]
class VesteSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'vesteSize', targetEntity: KidsVesteSize::class)]
    private Collection $kidVesteSize;

    #[ORM\OneToMany(mappedBy: 'vesteSize', targetEntity: AdultVesteSize::class)]
    private Collection $adultVesteSize;

    #[ORM\ManyToOne(inversedBy: 'vesteSize')]
    private ?ProductSize $productSize = null;

    public function __construct()
    {
        $this->kidVesteSize = new ArrayCollection();
        $this->adultVesteSize = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, KidsVesteSize>
     */
    public function getKidVesteSize(): Collection
    {
        return $this->kidVesteSize;
    }

    public function addKidVesteSize(KidsVesteSize $kidVesteSize): static
    {
        if (!$this->kidVesteSize->contains($kidVesteSize)) {
            $this->kidVesteSize->add($kidVesteSize);
            $kidVesteSize->setVesteSize($this);
        }

        return $this;
    }

    public function removeKidVesteSize(KidsVesteSize $kidVesteSize): static
    {
        if ($this->kidVesteSize->removeElement($kidVesteSize)) {
            // set the owning side to null (unless already changed)
            if ($kidVesteSize->getVesteSize() === $this) {
                $kidVesteSize->setVesteSize(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdultVesteSize>
     */
    public function getAdultVesteSize(): Collection
    {
        return $this->adultVesteSize;
    }

    public function addAdultVesteSize(AdultVesteSize $adultVesteSize): static
    {
        if (!$this->adultVesteSize->contains($adultVesteSize)) {
            $this->adultVesteSize->add($adultVesteSize);
            $adultVesteSize->setVesteSize($this);
        }

        return $this;
    }

    public function removeAdultVesteSize(AdultVesteSize $adultVesteSize): static
    {
        if ($this->adultVesteSize->removeElement($adultVesteSize)) {
            // set the owning side to null (unless already changed)
            if ($adultVesteSize->getVesteSize() === $this) {
                $adultVesteSize->setVesteSize(null);
            }
        }

        return $this;
    }

    public function getProductSize(): ?ProductSize
    {
        return $this->productSize;
    }

    public function setProductSize(?ProductSize $productSize): static
    {
        $this->productSize = $productSize;

        return $this;
    }
}
