<?php


namespace PitekShop\CollectionPoint\RepositoryImpl;


use PitekShop\CollectionPoint\CollectionPoint;
use PitekShop\CollectionPoint\HourAndMinutes;
use PitekShop\CollectionPoint\HourRange;
use PitekShop\CollectionPoint\OpenedDay;
use PitekShop\CollectionPoint\Repository\CollectionPointRepositoryInterface;

class DummyCollectionPointRepository implements CollectionPointRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getCollectionPointsByProductId(int $product_id): array
    {
        $collectionPoints = [];
        if ($product_id == 1) {
            $cp = new CollectionPoint(1, 'Collection Point 1', 'PP1', 'Testing street 6');
            $op = new OpenedDay(new \DateTime('2021-07-15'));
            $op->addHourRange(new HourRange(new HourAndMinutes(11, 30), new HourAndMinutes(15, 20)));
            $cp->addOpenedDay($op);
            array_push($collectionPoints, $cp);
        } else if ($product_id == 2) {

        }
        return $collectionPoints;
    }
}
