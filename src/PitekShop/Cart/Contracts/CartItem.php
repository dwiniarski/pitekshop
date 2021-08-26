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
    protected float $price = 0;

    /** @var float $price_per_month */
    protected float $price_per_month = 0;

    /**
     * Percent used to calculate price based on provided value
     * @var float|int
     */
    protected float $price_percent = 0;

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


    /**
     * @param float|null $price
     */
    public function setPricePerItem(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param float|null $price
     */
    public function setPricePerItemPerMonth(?float $price): void
    {
        $this->price_per_month = $price;
    }

    /**
     * @return float|null
     */
    public function getPricePerItem(): ?float
    {
        return $this->price;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->getPricePerItem() * $this->qty;
    }

    /**
     * @return float|null
     */
    public function getPricePerMonthPerItem(): ?float
    {
        return $this->price_per_month;
    }

    /**
     * @return float|null
     */
    public function getPricePerMonth(): ?float
    {
        return $this->getPricePerMonthPerItem() * $this->qty;
    }

    /**
     * @return float|int
     */
    public function getPricePercent()
    {
        return $this->price_percent;
    }

    /**
     * @param float|int $price_percent
     */
    public function setPricePercent($price_percent): void
    {
        $this->price_percent = $price_percent;
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
