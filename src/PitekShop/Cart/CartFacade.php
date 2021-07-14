<?php


namespace PitekShop\Cart;


class CartFacade
{
    /**
     * @var CartStorage $cartStorage
     */
    private $cartStorage;

    /**
     * @var Cart $cart
     */
    private $cart;

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

    public function saveCart()
    {
        $this->cartStorage->storeCart($this->cart);
    }


}
