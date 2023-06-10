<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event extends Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $remainingDay = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemainingDay(): ?int
    {
        return $this->remainingDay;
    }

    public function setRemainingDay(int $remainingDay): self
    {
        $this->remainingDay = $remainingDay;

        return $this;
    }
}
