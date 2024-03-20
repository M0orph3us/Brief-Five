<?php
final class Users
{
    // params
    private string $uuid, $firstname, $lastname, $mail, $password, $role, $created_at;

    // contructor
    public function __construct()
    {
        // $this->hydrate($infos);
    }

    // function to hydrate
    private function hydrate(array $array): void
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
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     *  @return string
     */
    public function getCreated_at(): string
    {
        $getDate = $this->created_at;
        $date = new DateTimeImmutable($getDate);
        $dateFormat = $date->format('d/m/Y');
        return $dateFormat;
    }

    // methods


}
