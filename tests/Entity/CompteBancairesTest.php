<?php

use PHPUnit\Framework\TestCase;
use App\Entity\CompteBancaire;

class CompteBancaireTest extends TestCase
{
    /**
     * Data provider for testRetirer
     * Format: [initialBalance, withdrawAmount, expectedBalance]
     */
    public function retirerDataProvider()
    {
        return [
            [1000, 200, 800],
            [1000, 500, 500],
            [1000, 100, 900],
            [1000, 1000, 0],
            [500, 250, 250],
        ];
    }

    /**
     * @dataProvider retirerDataProvider
     */
    public function testRetirer($soldeInitial, $montantRetire, $soldeAttendu)
    {
        $compte = new CompteBancaire("Ali", $soldeInitial);

        $nouveauSolde = $compte->retirer($montantRetire);

        $this->assertEquals($soldeAttendu, $nouveauSolde);
    }

    public function testRetirerSoldeInsuffisant()
    {
        $this->expectException(Exception::class);

        $compte = new CompteBancaire("Ali", 100);

        $compte->retirer(200);
    }
}
