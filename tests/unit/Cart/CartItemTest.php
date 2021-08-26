<?php


namespace unit\Cart;


use PitekShop\Cart\BasicCartItem;
use PitekShop\Cart\Contracts\CartItem;
use PitekShop\Product\Contracts\Product;

class CartItemTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateBasicCartItem()
    {
        $this->assertInstanceOf(CartItem::class, new BasicCartItem($this->createMock(Product::class), 1, []));
    }

    public function testPriceCalculation()
    {
        $cartItem = new BasicCartItem($this->createMock(Product::class), 3, []);
        $cartItem->setPricePerItem(20.0);
        $cartItem->setPricePerItemPerMonth(5.0);

        $this->assertEquals(20.0, $cartItem->getPricePerItem());
        $this->assertEquals(5.0, $cartItem->getPricePerMonthPerItem());

        $this->assertEquals(60.0, $cartItem->getPrice());
        $this->assertEquals(15.0, $cartItem->getPricePerMonth());
    }
}