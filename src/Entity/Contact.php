<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContactRepository;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\Length(
        min: 3,
        //max: 50,
        minMessage: 'Your first name must be at least {{ limit }} characters long',
        //maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
    )]
    #[ORM\Column(length: 255)]
    private ?string $full_name = null;

    #[Email(message: 'The email {{ value }} is not a valid email.')]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Assert\Length(
        min: 10,
        //max: 50,
        minMessage: 'Your subject must be at least {{ limit }} characters long',
        //maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
    )]
    #[ORM\Column(length: 255)]
    private ?string $subject = null;

    #[Assert\Length(
        min: 20,
        //max: 50,
        minMessage: 'Your message must be at least {{ limit }} characters long',
        //maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
    )]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?bool $view = false;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;

        return $this;
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

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isView(): ?bool
    {
        return $this->view;
    }

    public function setView(bool $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
