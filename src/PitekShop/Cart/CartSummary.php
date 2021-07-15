<?php


namespace PitekShop\Cart;


class CartSummary
{
    private $total_price_without_discount;
    private $total_price_monthly_without_discount;

    private $total_price;
    private $total_price_monthly;

    /**
     * @return mixed
     */
    public function getTotalPriceWithoutDiscount()
    {
        return $this->total_price_without_discount;
    }

    /**
     * @param mixed $total_price_without_discount
     */
    public function setTotalPriceWithoutDiscount($total_price_without_discount): void
    {
        $this->total_price_without_discount = $total_price_without_discount;
    }

    /**
     * @return mixed
     */
    public function getTotalPriceMonthlyWithoutDiscount()
    {
        return $this->total_price_monthly_without_discount;
    }

    /**
     * @param mixed $total_price_monthly_without_discount
     */
    public function setTotalPriceMonthlyWithoutDiscount($total_price_monthly_without_discount): void
    {
        $this->total_price_monthly_without_discount = $total_price_monthly_without_discount;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price): void
    {
        $this->total_price = $total_price;
    }

    /**
     * @return mixed
     */
    public function getTotalPriceMonthly()
    {
        return $this->total_price_monthly;
    }

    /**
     * @param mixed $total_price_monthly
     */
    public function setTotalPriceMonthly($total_price_monthly): void
    {
        $this->total_price_monthly = $total_price_monthly;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->total_price_without_discount - $this->total_price;
    }

    /**
     * @return mixed
     */
    public function getMonthlyDiscount()
    {
        return $this->total_price_monthly_without_discount - $this->total_price_monthly;
    }

}
