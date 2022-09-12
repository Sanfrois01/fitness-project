<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructureRepository::class)]
class Structure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $strutuce_name = null;

    #[ORM\Column]
    private ?int $structure_phone = null;

    #[ORM\Column(length: 255)]
    private ?string $structure_address = null;

    #[ORM\Column]
    private ?int $structure_postal = null;

    #[ORM\Column]
    private ?bool $structure_active = null;

    #[ORM\ManyToOne(inversedBy: 'user_structures')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStrutuceName(): ?string
    {
        return $this->strutuce_name;
    }

    public function setStrutuceName(string $strutuce_name): self
    {
        $this->strutuce_name = $strutuce_name;

        return $this;
    }

    public function getStructurePhone(): ?int
    {
        return $this->structure_phone;
    }

    public function setStructurePhone(int $structure_phone): self
    {
        $this->structure_phone = $structure_phone;

        return $this;
    }

    public function getStructureAddress(): ?string
    {
        return $this->structure_address;
    }

    public function setStructureAddress(string $structure_address): self
    {
        $this->structure_address = $structure_address;

        return $this;
    }

    public function getStructurePostal(): ?int
    {
        return $this->structure_postal;
    }

    public function setStructurePostal(int $structure_postal): self
    {
        $this->structure_postal = $structure_postal;

        return $this;
    }

    public function isStructureActive(): ?bool
    {
        return $this->structure_active;
    }

    public function setStructureActive(bool $structure_active): self
    {
        $this->structure_active = $structure_active;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
