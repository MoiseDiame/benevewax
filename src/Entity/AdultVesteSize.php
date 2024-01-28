<?php

namespace App\Entity;

use App\Repository\AdultVesteSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdultVesteSizeRepository::class)]
class AdultVesteSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\ManyToMany(targetEntity: VesteSize::class, mappedBy: 'adultVesteSize')]
    private Collection $vesteSizes;

    #[ORM\ManyToOne(inversedBy: 'adultVesteSize')]
    private ?VesteSize $vesteSize = null;

    public function __construct()
    {
        $this->vesteSizes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): static
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return Collection<int, VesteSize>
     */
    public function getVesteSizes(): Collection
    {
        return $this->vesteSizes;
    }

    public function addVesteSize(VesteSize $vesteSize): static
    {
        if (!$this->vesteSizes->contains($vesteSize)) {
            $this->vesteSizes->add($vesteSize);
            $vesteSize->addAdultVesteSize($this);
        }

        return $this;
    }

    public function removeVesteSize(VesteSize $vesteSize): static
    {
        if ($this->vesteSizes->removeElement($vesteSize)) {
            $vesteSize->removeAdultVesteSize($this);
        }

        return $this;
    }

    public function getVesteSize(): ?VesteSize
    {
        return $this->vesteSize;
    }

    public function setVesteSize(?VesteSize $vesteSize): static
    {
        $this->vesteSize = $vesteSize;

        return $this;
    }
}
