<?php


namespace PitekShop\Cart;

class EshopCart extends Cart
{
    /**
     * @return EshopCartSummary
     */
    public function getCartSummary(): EshopCartSummary
    {
        $total = 0;
        $total_monthly = 0;
        /* @var $item EshopCartItem */
        foreach ($this->items as $item) {
            $total += $item->getPrice();
            $total_monthly += $item->getPricePerMonth();
        }

        $cartSummary = new EshopCartSummary();
        $cartSummary->setTotalPrice($total);
        $cartSummary->setTotalPriceMonthly($total_monthly);

        return $cartSummary;
    }
}
