<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\Column(length: 255)]
    private ?string $prezPicture = null;

    #[ORM\ManyToMany(targetEntity: ProductSize::class, inversedBy: 'products')]
    private Collection $size;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ShopCategory $shopCategory = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'ensembleProducts')]
    private Collection $ensemble;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'ensemble')]
    private Collection $ensembleProducts;

    #[ORM\Column(nullable: true)]
    private ?bool $assortiment = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ProductCategory $productCategory = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $otherPic1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $otherPic2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $otherPic3 = null;

    public function __construct()
    {
        $this->size = new ArrayCollection();
        $this->ensemble = new ArrayCollection();
        $this->ensembleProducts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

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

    public function getPrezPicture(): ?string
    {
        return $this->prezPicture;
    }

    public function setPrezPicture(string $prezPicture): static
    {
        $this->prezPicture = $prezPicture;

        return $this;
    }

    /**
     * @return Collection<int, ProductSize>
     */
    public function getSize(): Collection
    {
        return $this->size;
    }

    public function addSize(ProductSize $size): static
    {
        if (!$this->size->contains($size)) {
            $this->size->add($size);
        }

        return $this;
    }

    public function removeSize(ProductSize $size): static
    {
        $this->size->removeElement($size);

        return $this;
    }

    public function getShopCategory(): ?ShopCategory
    {
        return $this->shopCategory;
    }

    public function setShopCategory(?ShopCategory $shopCategory): static
    {
        $this->shopCategory = $shopCategory;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getEnsemble(): Collection
    {
        return $this->ensemble;
    }

    public function addEnsemble(self $ensemble): static
    {
        if (!$this->ensemble->contains($ensemble)) {
            $this->ensemble->add($ensemble);
        }

        return $this;
    }

    public function removeEnsemble(self $ensemble): static
    {
        $this->ensemble->removeElement($ensemble);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getEnsembleProducts(): Collection
    {
        return $this->ensembleProducts;
    }

    public function addEnsembleProduct(self $ensembleProduct): static
    {
        if (!$this->ensembleProducts->contains($ensembleProduct)) {
            $this->ensembleProducts->add($ensembleProduct);
            $ensembleProduct->addEnsemble($this);
        }

        return $this;
    }

    public function removeEnsembleProduct(self $ensembleProduct): static
    {
        if ($this->ensembleProducts->removeElement($ensembleProduct)) {
            $ensembleProduct->removeEnsemble($this);
        }

        return $this;
    }

    public function isAssortiment(): ?bool
    {
        return $this->assortiment;
    }

    public function setAssortiment(?bool $assortiment): static
    {
        $this->assortiment = $assortiment;

        return $this;
    }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->productCategory;
    }

    public function setProductCategory(?ProductCategory $productCategory): static
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getOtherPic1(): ?string
    {
        return $this->otherPic1;
    }

    public function setOtherPic1(?string $otherPic1): static
    {
        $this->otherPic1 = $otherPic1;

        return $this;
    }

    public function getOtherPic2(): ?string
    {
        return $this->otherPic2;
    }

    public function setOtherPic2(?string $otherPic2): static
    {
        $this->otherPic2 = $otherPic2;

        return $this;
    }

    public function getOtherPic3(): ?string
    {
        return $this->otherPic3;
    }

    public function setOtherPic3(?string $otherPic3): static
    {
        $this->otherPic3 = $otherPic3;

        return $this;
    }
}
