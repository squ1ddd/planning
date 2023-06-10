<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
class Sport extends Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $totalDistance = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $totalTime = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionType $aSesssionType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalDistance(): ?float
    {
        return $this->totalDistance;
    }

    public function setTotalDistance(?float $distance): self
    {
        $this->totalDistance = $distance;

        return $this;
    }

    public function getTotalTime(): ?\DateTimeInterface
    {
        return $this->totalTime;
    }

    public function setTotalTime(?\DateTimeInterface $totalTime): self
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    public function getASesssionType(): ?SessionType
    {
        return $this->aSesssionType;
    }

    public function setASesssionType(?SessionType $aSesssionType): self
    {
        $this->aSesssionType = $aSesssionType;

        return $this;
    }
}
