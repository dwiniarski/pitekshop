<?php


namespace PitekShop\Cart\Contracts;

use PitekShop\Cart\Traits\ContainsMetadata;

/**
 * Class Cart
 * @package PitekShop\Cart
 */
abstract class Cart implements MetadataObject
{
    use ContainsMetadata;

    /**
     * Array that contains items in a cart
     * @var CartItem[] $items
     */
    protected array $items = [];

    /**
     * Returns list of items in this cart instance
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Sets list of items directly
     * @param CartItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Removes all items from the cart
     */
    public function clearItems(): void
    {
        $this->setItems(array());
    }

    /**
     * Add single item to the cart. If the same item already exists in a cart then the quantity
     * of this item is just incremented.
     * @param CartItem $cartItem
     */
    public function addItem(CartItem $cartItem): void
    {
        $foundItem = null;
        foreach ($this->getItems() as $item) {
            if ($cartItem->isSameAs($item)) {
                $foundItem = $item;
                break;
            }
        }
        if ($foundItem) {
            $foundItem->setQty($foundItem->getQty() + $cartItem->getQty());
        } else {
            $this->items[$cartItem->getId()] = $cartItem;
        }
    }

    /**
     * Resturns number of items in the cart
     * @return int
     */
    public function numberOfItems(): int
    {
        return count($this->items);
    }

    /**
     * Is this cart empty?
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->numberOfItems() == 0;
    }

    /**
     * Remove item from this cart by item's unique id
     * @param string $id
     */
    public function removeItem(string $id): void
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
    }

    /**
     * Is this cart confirmed?
     * This means that all products, shipping, and billing data are confirmed.
     * @return bool
     */
    public function isConfirmed(): bool
    {
        if (isset($this->metadata['confirmed'])) {
            return $this->metadata['confirmed'];
        } else {
            return false;
        }
    }

    /**
     * @param bool $confirmed
     */
    public function setConfirmed(bool $confirmed): void
    {
        $this->metadata['confirmed'] = $confirmed;
    }

}
