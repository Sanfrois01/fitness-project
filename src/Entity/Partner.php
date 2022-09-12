<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $partner_name = null;

    #[ORM\Column]
    private ?int $partner_phone = null;

    #[ORM\Column]
    private ?bool $partner_active = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'user_partners')]
    private Collection $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartnerName(): ?string
    {
        return $this->partner_name;
    }

    public function setPartnerName(string $partner_name): self
    {
        $this->partner_name = $partner_name;

        return $this;
    }

    public function getPartnerPhone(): ?int
    {
        return $this->partner_phone;
    }

    public function setPartnerPhone(int $partner_phone): self
    {
        $this->partner_phone = $partner_phone;

        return $this;
    }

    public function isPartnerActive(): ?bool
    {
        return $this->partner_active;
    }

    public function setPartnerActive(bool $partner_active): self
    {
        $this->partner_active = $partner_active;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }
}
