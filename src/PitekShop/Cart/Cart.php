<?php


namespace PitekShop\Cart;

abstract class Cart implements MetadataObject
{
    use ContainsMetadata;

    /**
     * @var CartItem[] $items
     */
    protected $items = [];

    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
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
     * @return int Number of items in the cart
     */
    public function numberOfItems(): int
    {
        return count($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->numberOfItems() == 0;
    }

    /**
     * @param string $id
     */
    public function removeItem(string $id): void
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
    }

    /**
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
