<?php


namespace PitekShop\CollectionPoint;


class CollectionPoint
{
    private $id;
    private $name;
    private $code;
    private $address;

    /** @var OpenedDay[] $openedDays */
    private $openedDays = [];

    /**
     * CollectionPoint constructor.
     * @param $id int
     * @param $name string
     * @param $code string
     * @param $address string
     */
    public function __construct(int $id, string $name, string $code, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->address = $address;
    }

    /**
     * @return OpenedDay[]
     */
    public function getAvailableDates(): array
    {
        return $this->openedDays;
    }

    /**
     * @param OpenedDay $openedDay
     */
    public function addOpenedDay(OpenedDay $openedDay): void
    {
        array_push($this->openedDays, $openedDay);
    }

    public function clearOpenedDays(): void
    {
        $this->openedDays = [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    public function __toString()
    {
        return "Collection point: ".$this->getId()." ".$this->getName()." ".$this->getCode()." ".$this->getAddress();
    }


}
