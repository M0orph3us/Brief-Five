<?php
final class TeamsRepository
{
    // params
    private $db;

    // contructor
    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->getConnection();
    }

    // CRUD

}
