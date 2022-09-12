<?php

namespace App\Entity;

use App\Repository\PartnerPermissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerPermissionRepository::class)]
class PartnerPermission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $partner_permission_active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPartnerPermissionActive(): ?bool
    {
        return $this->partner_permission_active;
    }

    public function setPartnerPermissionActive(bool $partner_permission_active): self
    {
        $this->partner_permission_active = $partner_permission_active;

        return $this;
    }
}
