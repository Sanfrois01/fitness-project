<?php

namespace App\Entity;

use App\Repository\StructurePermissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructurePermissionRepository::class)]
class StructurePermission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $structure_permission_active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStructurePermissionActive(): ?bool
    {
        return $this->structure_permission_active;
    }

    public function setStructurePermissionActive(bool $structure_permission_active): self
    {
        $this->structure_permission_active = $structure_permission_active;

        return $this;
    }
}
