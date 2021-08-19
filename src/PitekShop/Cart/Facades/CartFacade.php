<?php


namespace PitekShop\Cart\Facades;


use PitekShop\Cart\Contracts\Cart;
use PitekShop\Cart\Contracts\CartStorage;

class CartFacade
{
    /**
     * @var CartStorage $cartStorage
     */
    private CartStorage $cartStorage;

    /**
     * @var Cart $cart
     */
    private Cart $cart;

    /**
     * CartFacade constructor.
     * @param CartStorage $cartStorage
     */
    public function __construct(CartStorage $cartStorage)
    {
        $this->cartStorage = $cartStorage;
        $this->cart = $cartStorage->retrieveCart();
    }

    /**
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * Saves cart data
     */
    public function saveCart()
    {
        $this->cartStorage->storeCart($this->cart);
    }

}
