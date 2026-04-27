<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length:255)]
    private ?string $proprietaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function __construct(string $proprietaire, float $solde)
    {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

   
    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function retirer(float $montant): float
    {
        if ($montant > $this->solde) {
            throw new \Exception("Solde insuffisant");
        } else {
            $this->solde = $this->solde - $montant;
            return $this->solde;
        }
    }
}