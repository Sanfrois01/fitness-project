<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $user_firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $user_lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $user_mail = null;

    #[ORM\Column(length: 255)]
    private ?string $user_password = null;

    #[ORM\Column]
    private ?bool $user_active = null;

    #[ORM\Column(length: 255)]
    private ?string $user_role = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $user_created = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Structure::class)]
    private Collection $user_structures;

    #[ORM\ManyToMany(targetEntity: Partner::class, mappedBy: 'user')]
    private Collection $user_partners;

    public function __construct()
    {
        $this->user_structures = new ArrayCollection();
        $this->user_partners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserFirstname(): ?string
    {
        return $this->user_firstname;
    }

    public function setUserFirstname(string $user_firstname): self
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->user_lastname;
    }

    public function setUserLastname(string $user_lastname): self
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    public function getUserMail(): ?string
    {
        return $this->user_mail;
    }

    public function setUserMail(string $user_mail): self
    {
        $this->user_mail = $user_mail;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function isUserActive(): ?bool
    {
        return $this->user_active;
    }

    public function setUserActive(bool $user_active): self
    {
        $this->user_active = $user_active;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->user_role;
    }

    public function setUserRole(string $user_role): self
    {
        $this->user_role = $user_role;

        return $this;
    }

    public function getUserCreated(): ?\DateTimeInterface
    {
        return $this->user_created;
    }

    public function setUserCreated(\DateTimeInterface $user_created): self
    {
        $this->user_created = $user_created;

        return $this;
    }

    /**
     * @return Collection<int, Structure>
     */
    public function getUserStructures(): Collection
    {
        return $this->user_structures;
    }

    public function addUserStructure(Structure $userStructure): self
    {
        if (!$this->user_structures->contains($userStructure)) {
            $this->user_structures->add($userStructure);
            $userStructure->setUser($this);
        }

        return $this;
    }

    public function removeUserStructure(Structure $userStructure): self
    {
        if ($this->user_structures->removeElement($userStructure)) {
            // set the owning side to null (unless already changed)
            if ($userStructure->getUser() === $this) {
                $userStructure->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Partner>
     */
    public function getUserPartners(): Collection
    {
        return $this->user_partners;
    }

    public function addUserPartner(Partner $userPartner): self
    {
        if (!$this->user_partners->contains($userPartner)) {
            $this->user_partners->add($userPartner);
            $userPartner->addUser($this);
        }

        return $this;
    }

    public function removeUserPartner(Partner $userPartner): self
    {
        if ($this->user_partners->removeElement($userPartner)) {
            $userPartner->removeUser($this);
        }

        return $this;
    }
}
