<?php
final class Teams
{
    // params
    private string $uuid, $firstname, $name;

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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
