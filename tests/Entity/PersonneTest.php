<?php
namespace App\Tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
    public function testCategorieMineur(): void
    {
        $personne = new Personne('Bara', 'Ali', 17);
        $this->assertSame('mineur', $personne->categorie());
    }

    public function testCategorieMajeur(): void
    {
        $personne = new Personne('Bara', 'Ali', 18);
        $this->assertSame('majeur', $personne->categorie());
    }

    public function testInvalidAge(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('age invalide');
        $personne = new Personne('Bara', 'Ali', 0);
       
}
}