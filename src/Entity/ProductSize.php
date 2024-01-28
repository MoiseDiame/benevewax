<?php

namespace App\Entity;

use App\Repository\ProductSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductSizeRepository::class)]
class ProductSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'productSize', targetEntity: VesteSize::class)]
    private Collection $vesteSize;

    #[ORM\OneToMany(mappedBy: 'productSize', targetEntity: ShoeSize::class)]
    private Collection $shoeSize;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'size', targetEntity: Product::class)]
    private Collection $products;

    public function __construct()
    {
        $this->vesteSize = new ArrayCollection();
        $this->shoeSize = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * @return Collection<int, VesteSize>
     */
    public function getVesteSize(): Collection
    {
        return $this->vesteSize;
    }

    public function addVesteSize(VesteSize $vesteSize): static
    {
        if (!$this->vesteSize->contains($vesteSize)) {
            $this->vesteSize->add($vesteSize);
            $vesteSize->setProductSize($this);
        }

        return $this;
    }

    public function removeVesteSize(VesteSize $vesteSize): static
    {
        if ($this->vesteSize->removeElement($vesteSize)) {
            // set the owning side to null (unless already changed)
            if ($vesteSize->getProductSize() === $this) {
                $vesteSize->setProductSize(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ShoeSize>
     */
    public function getShoeSize(): Collection
    {
        return $this->shoeSize;
    }

    public function addShoeSize(ShoeSize $shoeSize): static
    {
        if (!$this->shoeSize->contains($shoeSize)) {
            $this->shoeSize->add($shoeSize);
            $shoeSize->setProductSize($this);
        }

        return $this;
    }

    public function removeShoeSize(ShoeSize $shoeSize): static
    {
        if ($this->shoeSize->removeElement($shoeSize)) {
            // set the owning side to null (unless already changed)
            if ($shoeSize->getProductSize() === $this) {
                $shoeSize->setProductSize(null);
            }
        }

        return $this;
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
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setSize($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getSize() === $this) {
                $product->setSize(null);
            }
        }

        return $this;
    }
}
