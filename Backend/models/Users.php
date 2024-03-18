<?php
final class Users
{
    // params

    // contructor
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

    // methods
}