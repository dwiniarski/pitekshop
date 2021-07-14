<?php


namespace PitekShop\CollectionPoint\Repository;


use PitekShop\CollectionPoint\CollectionPoint;

interface CollectionPointRepositoryInterface
{
    /**
     * @param $product_id int
     * @return CollectionPoint[]
     */
    public function getCollectionPointsByProductId(int $product_id): array;
}
