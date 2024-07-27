<?php

namespace App\Entity;

use App\Enum\OrderStatusEnum;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups('order_infos')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?bool $paid = null;

    #[ORM\Column(length: 255)]
    #[Groups('order_infos')]
    private ?string $reference = null;

    #[ORM\Column]
    #[Groups('order_infos')]
    private ?float $shippingFees = null;

    #[ORM\Column]
    #[Groups('order_infos')]
    private ?float $productsPrice = null;

    #[ORM\Column]
    #[Groups('order_infos')]
    private ?float $totalToPay = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tracking = null;

    #[ORM\OneToMany(mappedBy: 'myOrder', targetEntity: OrderDetails::class, cascade: ['persist'])]
    #[Groups('order_infos')]
    private Collection $orderDetails;

    #[ORM\Column(length: 255)]
    #[Groups('order_infos')]
    private ?string $customer = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups('order_infos')]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true, enumType: OrderStatusEnum::class)]
    private ?string $status = null;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): static
    {
        $this->paid = $paid;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getShippingFees(): ?float
    {
        return $this->shippingFees;
    }

    public function setShippingFees(float $shippingFees): static
    {
        $this->shippingFees = $shippingFees;

        return $this;
    }

    public function getProductsPrice(): ?float
    {
        return $this->productsPrice;
    }

    public function setProductsPrice(float $productsPrice): static
    {
        $this->productsPrice = $productsPrice;

        return $this;
    }

    public function getTotalToPay(): ?float
    {
        return $this->totalToPay;
    }

    public function setTotalToPay(float $totalToPay): static
    {
        $this->totalToPay = $totalToPay;

        return $this;
    }

    public function getTracking(): ?string
    {
        return $this->tracking;
    }

    public function setTracking(?string $tracking): static
    {
        $this->tracking = $tracking;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetails>
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): static
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails->add($orderDetail);
            $orderDetail->setMyOrder($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): static
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getMyOrder() === $this) {
                $orderDetail->setMyOrder(null);
            }
        }

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
