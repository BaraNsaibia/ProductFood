<?php

namespace App\Entity;

use App\Repository\FormeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormeRepository::class)]
class Forme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $long = null;

    #[ORM\Column]
    private ?int $larg = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function __construct(?int $long = null, ?int $larg = null, ?string $type = null)
    {
        $this->long = $long;
        $this->larg = $larg;
        $this->type = $type;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLong(): ?int
    {
        return $this->long;
    }

    public function setLong(int $long): static
    {
        $this->long = $long;

        return $this;
    }

    public function getLarg(): ?int
    {
        return $this->larg;
    }

    public function setLarg(int $larg): static
    {
        $this->larg = $larg;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
    public function surface(): int
{
    if ($this->type === "carre" && $this->long !== $this->larg) {
        throw new \Exception("Un carré doit avoir long = larg");
    }

    return $this->long * $this->larg;
}

public function perimetre(): int
{
    if ($this->type === "carre" && $this->long !== $this->larg) {
        throw new \Exception("Un carré doit avoir long = larg");
    }

    return 2 * ($this->long + $this->larg);
}
}
