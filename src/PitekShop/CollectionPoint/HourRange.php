<?php


namespace PitekShop\CollectionPoint;


use PitekShop\CollectionPoint\Exceptions\HourRangeException;

class HourRange
{
    /** @var HourAndMinutes $hour_from */
    private $hour_from;

    /** @var HourAndMinutes $hour_to */
    private $hour_to;

    public function __construct(HourAndMinutes $hour_from, HourAndMinutes $hour_to)
    {
        if ($hour_from->isBefore($hour_to)) {
            $this->hour_from = $hour_from;
            $this->hour_to = $hour_to;
        } else {
            throw new HourRangeException('Hour from has to be before hour to.');
        }
    }

    public function __toString(): string
    {
        return $this->hour_from . "-" . $this->hour_to;
    }


}
