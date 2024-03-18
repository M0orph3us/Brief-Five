<?php
require '../../config/autoload.php';
final class UsersRepository
{
    // params

    // contructor
    public function __construct()
    {
        $db = new Database();
        $getDb = $db->getConnection();
    }

    // CRUD
}