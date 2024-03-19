<?php
final class Users
{
    // params
    private $firstname, $lastname, $mail, $password, $role, $created_at;

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
     *  @return DateTimeImmutable
     */
    public function getCreated_at(): DateTimeImmutable
    {
        return $this->created_at;
    }

    // methods
}
