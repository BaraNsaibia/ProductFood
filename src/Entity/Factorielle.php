<?php

namespace App\Entity;

use App\Repository\FactorielleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactorielleRepository::class)]
class Factorielle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbr = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbr(): ?int
    {
        return $this->nbr;
    }

    public function setNbr(int $nbr): static
    {
        $this->nbr = $nbr;

        return $this;
    }
    public class Factorielle {
    
    private int mbr; 

    
    public Factorielle(int mbr) {
        this.mbr = mbr;
    }

    
    public int calculFactoriel() throws Exception {
        if (mbr < 0) {
            throw new Exception("Le nombre ne peut pas être négatif");
        }
        
       if (mbr == 0) {
            return 1;
        }
        int f = 1;
        for (int i = 2; i <= mbr; i++) {
            f *= i; 
        }
        
        return f;
    }
}
}
