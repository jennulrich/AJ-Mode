<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
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
    private $shop_name;

    /**
     * @OneToOne(targetEntity="User", cascade={"persist", "remove"})
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user_id;

    /**
     * @OneToMany(targetEntity="Catalog", mappedBy="shop", cascade={"remove", "persist"})
     */
    private $shop;


    public function __construct()
    {
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopName(): ?string
    {
        return $this->shop_name;
    }

    public function setShopName(string $shop_name): self
    {
        $this->shop_name = $shop_name;

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

    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @param mixed $shop
     */
    public function setShop($shop): void
    {
        $this->shop = $shop;
    }
}
