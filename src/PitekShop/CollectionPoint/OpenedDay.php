<?php


namespace PitekShop\CollectionPoint;


class OpenedDay
{
    /** @var DateTime $date */
    private $date;

    /** @var HourRange[] $hourRange */
    private array $hourRanges = [];

    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @param HourRange $hourRange
     */
    public function addHourRange(HourRange $hourRange): void
    {
        array_push($this->hourRanges, $hourRange);
    }

    /**
     * @return HourRange[]
     */
    public function getHourRanges(): array
    {
        return $this->hourRanges;
    }
}
