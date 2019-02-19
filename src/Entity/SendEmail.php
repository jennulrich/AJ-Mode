<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SendEmailRepository")
 */
class SendEmail
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
    private $Expediteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Destinataire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Subject;

    /**
     * @ORM\Column(type="text")
     */
    private $Message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpediteur(): ?string
    {
        return $this->Expediteur;
    }

    public function setExpediteur(string $Expediteur): self
    {
        $this->Expediteur = $Expediteur;

        return $this;
    }

    public function getDestinataire(): ?string
    {
        return $this->Destinataire;
    }

    public function setDestinataire(string $Destinataire): self
    {
        $this->Destinataire = $Destinataire;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(string $Subject): self
    {
        $this->Subject = $Subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }
}
