<?php


namespace PitekShop\CollectionPoint\Facades;


use PitekShop\CollectionPoint\CollectionPoint;
use PitekShop\CollectionPoint\Repository\CollectionPointRepositoryInterface;

class CollectionPointFacade
{
    /** @var CollectionPointRepositoryInterface $collectionPointRepository */
    private $collectionPointRepository;

    public function __construct(CollectionPointRepositoryInterface $collectionPointRepository)
    {
        $this->collectionPointRepository = $collectionPointRepository;
    }


    /**
     * @param int $product_id
     * @return CollectionPoint[]
     */
    public function findAllByProductId(int $product_id): array
    {
        return $this->collectionPointRepository->getCollectionPointsByProductId($product_id);
    }
}
