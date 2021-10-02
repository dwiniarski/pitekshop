<?php


namespace PitekShop\Cart;


use PitekShop\Cart\Contracts\CartItem;

class BasicCartItem extends CartItem
{
    public function toArray(): array
    {
        return [];
    }

}
