<?php


namespace PitekShop\Cart;


interface CartStorage
{
    /**
     * @param Cart $cart
     */
    public function storeCart(Cart $cart): void;

    /**
     * @return Cart
     */
    public function retrieveCart(): Cart;
}
