<?php


namespace PitekShop\Cart\Contracts;


interface CartValidator
{
    /**
     * @param Cart $cart
     * @return bool
     */
    public function validate(Cart $cart): bool;
}