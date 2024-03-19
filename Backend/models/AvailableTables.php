<?php
final class AvailableTables
{
    // params
    private string $uuid;
    private int $quantity_tables;
    // constructor
    public function __construct(array $infos)
    {
        $this->hydrate($infos);
    }

    // function to hydrate
    private function hydrate(array $array)
    {
        foreach ($array as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    // setters & getters

    /**
     * $return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return int
     */
    public function getQuantity_tables(): int
    {
        return $this->quantity_tables;
    }
}
