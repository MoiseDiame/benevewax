<?php

namespace App\Entity;

use App\Repository\KidsShoeSizeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KidsShoeSizeRepository::class)]
class KidsShoeSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\ManyToOne(inversedBy: 'kidShoeSize')]
    private ?ShoeSize $shoeSize = null;

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

    public function getShoeSize(): ?ShoeSize
    {
        return $this->shoeSize;
    }

    public function setShoeSize(?ShoeSize $shoeSize): static
    {
        $this->shoeSize = $shoeSize;

        return $this;
    }
}
