<?php


namespace PitekShop\Cart;

use PitekShop\Cart\Contracts\Cart;

class BasicCart extends Cart
{
    /**
     * @return CartSummary
     */
    public function getCartSummary(): CartSummary
    {
        $total = 0;
        $total_monthly = 0;
        /* @var $item BasicCartItem */
        foreach ($this->items as $item) {
            $total += $item->getPrice();
            $total_monthly += $item->getPricePerMonth();
        }

        $cartSummary = new CartSummary();
        $cartSummary->setTotalPrice($total);
        $cartSummary->setTotalPriceMonthly($total_monthly);

        return $cartSummary;
    }

    public function toArray(): array
    {
        return [];
    }

}
