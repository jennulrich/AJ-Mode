<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_admin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_shop;

    /**
     * @ORM\Column(type="text")
     */
    private $address_1;

    /**
     * @ORM\Column(type="text")
     */
    private $address_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_customer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        if($this->isAdmin()) {
            $roles = ['ROLE_ADMIN'];
        }

        if($this->isShop()) {
            $roles = ['ROLE_BOUTIQUE'];
        }

        if($this->isCustomer()) {
            $roles = ['ROLE_CLIENT'];
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /*
     * Get isAdmin
     *
     * @return boolean
     */
    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    /*
     * Get isAdmin
     *
     * @return bool
     */
    public function isAdmin() {
        return $this->is_admin;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /*
     * Get isShop
     *
     * @return boolean
     */
    public function getIsShop(): ?bool
    {
        return $this->is_shop;
    }

    public function setIsShop(bool $is_shop): self
    {
        $this->is_shop = $is_shop;

        return $this;
    }

    /*
     * Get isShop
     *
     * @return bool
     */
    public function isShop() {
        return $this->is_shop;
    }

    public function getAddress1(): ?string
    {
        return $this->address_1;
    }

    public function setAddress1(string $address_1): self
    {
        $this->address_1 = $address_1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address_2;
    }

    public function setAddress2(string $address_2): self
    {
        $this->address_2 = $address_2;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getIsCustomer(): ?bool
    {
        return $this->is_customer;
    }

    public function setIsCustomer(bool $is_customer): self
    {
        $this->is_customer = $is_customer;

        return $this;
    }

    /*
     * Get isCustomer
     *
     * @return bool
     */
    public function isCustomer() {
        return $this->is_customer;
    }

    /*
 * Get isUser
 *
 * @return boolean
 */
    public function getIsUser(): ?bool
    {
        return $this->is_user;
    }

    public function setIsUser(bool $is_user): self
    {
        $this->is_user = $is_user;

        return $this;
    }

    /*
     * Get isUser
     *
     * @return bool
     */
    public function isUser() {
        return $this->is_user;
    }
}
