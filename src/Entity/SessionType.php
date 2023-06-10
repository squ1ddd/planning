<?php

namespace App\Entity;

use App\Repository\SessionTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionTypeRepository::class)]
class SessionType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $warmUp = null;

    #[ORM\Column]
    private ?bool $recovery = null;

    #[ORM\Column(length: 255)]
    private ?string $word = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isWarmUp(): ?bool
    {
        return $this->warmUp;
    }

    public function setWarmUp(bool $warmUp): self
    {
        $this->warmUp = $warmUp;

        return $this;
    }

    public function isRecovery(): ?bool
    {
        return $this->recovery;
    }

    public function setRecovery(bool $recovery): self
    {
        $this->recovery = $recovery;

        return $this;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(string $word): self
    {
        $this->word = $word;

        return $this;
    }
}
