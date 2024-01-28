<?php

namespace App\Entity;

use App\Repository\ShoeSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoeSizeRepository::class)]
class ShoeSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'shoeSize', targetEntity: KidsShoeSize::class)]
    private Collection $kidShoeSize;

    #[ORM\OneToMany(mappedBy: 'shoeSize', targetEntity: AdultShoesSize::class)]
    private Collection $adultShoeSize;

    #[ORM\ManyToOne(inversedBy: 'shoeSize')]
    private ?ProductSize $productSize = null;

    public function __construct()
    {
        $this->kidShoeSize = new ArrayCollection();
        $this->adultShoeSize = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, KidsShoeSize>
     */
    public function getKidShoeSize(): Collection
    {
        return $this->kidShoeSize;
    }

    public function addKidShoeSize(KidsShoeSize $kidShoeSize): static
    {
        if (!$this->kidShoeSize->contains($kidShoeSize)) {
            $this->kidShoeSize->add($kidShoeSize);
            $kidShoeSize->setShoeSize($this);
        }

        return $this;
    }

    public function removeKidShoeSize(KidsShoeSize $kidShoeSize): static
    {
        if ($this->kidShoeSize->removeElement($kidShoeSize)) {
            // set the owning side to null (unless already changed)
            if ($kidShoeSize->getShoeSize() === $this) {
                $kidShoeSize->setShoeSize(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdultShoesSize>
     */
    public function getAdultShoeSize(): Collection
    {
        return $this->adultShoeSize;
    }

    public function addAdultShoeSize(AdultShoesSize $adultShoeSize): static
    {
        if (!$this->adultShoeSize->contains($adultShoeSize)) {
            $this->adultShoeSize->add($adultShoeSize);
            $adultShoeSize->setShoeSize($this);
        }

        return $this;
    }

    public function removeAdultShoeSize(AdultShoesSize $adultShoeSize): static
    {
        if ($this->adultShoeSize->removeElement($adultShoeSize)) {
            // set the owning side to null (unless already changed)
            if ($adultShoeSize->getShoeSize() === $this) {
                $adultShoeSize->setShoeSize(null);
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
