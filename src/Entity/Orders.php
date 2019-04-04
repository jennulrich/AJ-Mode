<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
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
    private $order_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ordered_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $shipped_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @OneToOne(targetEntity="User", cascade={"persist", "remove"})
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user_id;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?string
    {
        return $this->order_number;
    }

    public function setOrderNumber(string $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrderedAt(): ?\DateTimeInterface
    {
        return $this->ordered_at;
    }

    public function setOrderedAt(\DateTimeInterface $ordered_at): self
    {
        $this->ordered_at = $ordered_at;

        return $this;
    }

    public function getShippedAt(): ?\DateTimeInterface
    {
        return $this->shipped_at;
    }

    public function setShippedAt(\DateTimeInterface $shipped_at): self
    {
        $this->shipped_at = $shipped_at;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
}
