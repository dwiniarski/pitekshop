<?php


namespace PitekShop\CollectionPoint;


use PitekShop\CollectionPoint\Exceptions\HourException;

class HourAndMinutes
{
    /** @var int $hours */
    private int $hours;

    /** @var int $minutes */
    private int $minutes;

    public function __construct(int $hours, int $minutes)
    {
        if ($hours < 0 || $hours > 23) {
            throw new HourException('Hours out of range 0-23');
        }
        if ($hours < 0 || $hours > 59) {
            throw new HourException('Minutes out of range 0-59');
        }
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    /**
     * @param HourAndMinutes $hour
     * @return bool
     */
    public function isBefore(HourAndMinutes $hour): bool
    {
        if ($this->getHours() < $hour->getHours()) {
            return true;
        } else if ($this->getHours() == $hour->getMinutes()) {
            if ($this->getMinutes() < $hour->getMinutes()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function __toString(): string
    {
        return $this->hours . ":" . $this->minutes;
    }

    /**
     * @return int
     */
    public function getHours(): int
    {
        return $this->hours;
    }

    /**
     * @return int
     */
    public function getMinutes(): int
    {
        return $this->minutes;
    }
}
