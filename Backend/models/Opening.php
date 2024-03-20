<?php
final class Opening
{
    // params
    private string $uuid, $opening_day, $opening_hour;

    // constructor
    public function __construct()
    {
        // $this->hydrate($infos);
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
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getOpening_day(): string
    {
        return $this->opening_day;
    }

    /**
     * @return string
     */
    public function getOpening_hour(): string
    {
        return $this->opening_hour;
    }
}
