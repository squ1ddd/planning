<?php

namespace App\Entity;

use App\Repository\PriorityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriorityRepository::class)]
class Priority
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $indexPriority = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndexPriority(): ?int
    {
        return $this->indexPriority;
    }

    public function setIndexPriority(int $indexPriority): self
    {
        $this->indexPriority = $indexPriority;

        return $this;
    }
}
