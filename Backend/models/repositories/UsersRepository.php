<?php

require '../../config/autoload.php';

final class UsersRepository
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

    public function create(array $data)
    {
        $sql = "INSERT INTO Users (id, firtsname, lastname, mail, password, createdAt) VALUE(UUID_TO_BIN(UUID(),true), firtsname:, lastname:, mail:, password:, createdAt:)";
        try {

            $params = [
                'firtsname' => $data['firstnme'],
                'lastname' => $data['lastname'],
                'mail' => $data['mail'],
                'password' => $data['password'],
                'createdAt' => date('Y-m-d')
            ];

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();

            $userId = $this->db->lastInsertId();
            $params['id'] = $userId;
            $user = new Users($params);
            return $user;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }

    public function readOne()
    {
    }

    public function readAll()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
