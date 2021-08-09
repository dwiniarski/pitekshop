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
}