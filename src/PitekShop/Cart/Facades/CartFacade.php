<?php


namespace PitekShop\Cart\Facades;


use PitekShop\Cart\Contracts\Cart;
use PitekShop\Cart\Contracts\CartStorage;
use PitekShop\Cart\Contracts\CartValidator;

class CartFacade
{
    /**
     * @var CartStorage $cartStorage
     */
    private CartStorage $cartStorage;

    /**
     * @var CartValidator $cartValidator
     */
    private CartValidator $cartValidator;

    /**
     * @var Cart $cart
     */
    private Cart $cart;

    /**
     * CartFacade constructor.
     * @param CartStorage $cartStorage
     * @param CartValidator $cartValidator
     */
    public function __construct(CartStorage $cartStorage, CartValidator $cartValidator)
    {
        $this->cartStorage = $cartStorage;
        $this->cartValidator = $cartValidator;
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

    /**
     * Validates this cart
     * @return bool
     */
    public function validate(): bool
    {
        return $this->cartValidator->validate($this->cart);
    }

}
