<?php


namespace PitekShop\Cart\Contracts;


use PitekShop\Cart\Traits\ContainsMetadata;
use PitekShop\Product\Contracts\Product;

abstract class CartItem implements MetadataObject
{
    use ContainsMetadata;

    /** @var int $id */
    protected $id;

    /**
     * @var int $identifier_length
     */
    protected int $identifier_length = 32;

    /**
     * @var Product $product
     */
    protected Product $product;

    /** @var int $qty */
    protected int $qty;

    /** @var float $price */
    protected $price = 0;

    /** @var float $price_per_month */
    protected $price_per_month = 0;

    public function __construct(Product $product, int $qty, array $metadata = [])
    {
        $this->id = $this->generateRandomIdentifier();
        $this->product = $product;
        $this->qty = $qty;
        foreach (array_keys($metadata) as $metadata_key) {
            $this->setMetadataByKey($metadata_key, $metadata[$metadata_key]);
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setPricePerMonth($price)
    {
        $this->price_per_month = $price;
    }

    /**
     * @return int
     */
    public function getPricePerItem(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price * $this->qty;
    }

    /**
     * @return int
     */
    public function getPricePerMonthPerItem(): int
    {
        return $this->price_per_month;
    }

    /**
     * @return int
     */
    public function getPricePerMonth(): int
    {
        return $this->price_per_month * $this->qty;
    }

    /**
     * @param int $qty
     */
    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    public function isSameAs(CartItem $cartItem): bool
    {
        if ($this->getProduct()->getId() != $cartItem->getProduct()->getId()) {
            return false;
        }
        if ($this->getPricePerItem() != $cartItem->getPricePerItem()) {
            return false;
        }
        if ($this->getPricePerMonthPerItem() != $cartItem->getPricePerMonthPerItem()) {
            return false;
        }
        /* If number of metadata elements is not the same than objects are different */
        if (count($this->getMetadata()) != count($cartItem->getMetadata())) {
            return false;
        } else {
            /* Check metadata element after element */
            foreach (array_keys($this->getMetadata()) as $key) {
                if (!$cartItem->existsMetadataByKey($key)) {
                    return false;
                } else {
                    if ($this->getMetadataByKey($key) != $cartItem->getMetadataByKey($key)) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    protected function generateRandomIdentifier(): string
    {
        return substr(str_shuffle(MD5(microtime())), 0, $this->identifier_length);
    }
}
