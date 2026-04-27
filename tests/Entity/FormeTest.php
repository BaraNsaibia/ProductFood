<?php

namespace App\Tests\Entity;

use App\Entity\Forme;
use PHPUnit\Framework\TestCase;

class FormeTest extends TestCase
{
    public function testFormeSurface(): void
    {
        $f = new Forme(5, 5, "carre");
        $this->assertEquals(25, $f->surface());
    }

    public function testFormePerimetre(): void
    {
        $f = new Forme(5, 5, "carre");
        $this->assertEquals(20, $f->perimetre());
    }

    public function testCarreValidation(): void
    {
        $this->expectException(\Exception::class);
        $f = new Forme(5, 10, "carre");
        $f->surface();
    }
}
