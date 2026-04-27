<?php  
namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider foodPricesProvider
     */
    public function testFood($price, $expectedTva)
    {
        $product = new Product('Test Product', 'food', $price);
        $tva = $product->computetva();
        $this->assertSame($expectedTva, $tva);
    }

    public function foodPricesProvider()
    {
        return [
            [1, 0.055],
            [10, 0.55],
            [20, 1.1],
            [100, 5.5],
        ];
    }

    public function testOther()
    {
        $product = new Product('Test Product', 'other', 10);
        $tva = $product->computetva();
        $this->assertSame(1.96, $tva);
    }

    public function testInvalidPrice()
    {
        $product = new Product('Test Product', 'food', -10);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le prix doit être supérieur à 0');
        $product->computetva();
    }   
}
?>