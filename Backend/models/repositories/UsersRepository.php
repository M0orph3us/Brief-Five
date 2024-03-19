<?php
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

    /**
     * @param array<string, mixed> $data
     * @return Users|null
     */
    public function create(array $data): ?Users
    {
        $sql = "INSERT INTO Users (firtsname, lastname, mail, password) VALUE(:firtsname, :lastname, :mail, :password)";
        try {

            $params = [
                'firtsname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'mail' => $data['mail'],
                'password' => $data['password']
            ];

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();

            $userId = $this->db->lastInsertId();
            var_dump($userId);
            $params['id'] = $userId;
            $user = new Users($params);
            return $user;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return Users|null
     */
    public function readOne(int $id): ?Users
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $params = [
            'id' => $id
        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->setFetchMode(PDO::FETCH_CLASS, Users::class);
            $request = $stmt->fetch();
            $stmt->closeCursor();
            return $request;
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage();
        }
    }

    /**
     * @return Users|null
     */
    public function readAll(): ?Users
    {
        $sql = "SELECT * FROM users";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $request = $stmt->fetchAll(PDO::FETCH_CLASS, Users::class);
            $stmt->closeCursor();
            return $request;
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage();
        }
    }
    /**
     * @param int $id
     * @param array<string, mixed> $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $sql = 'UPDATE users SET firtsname = :firtsname, lastname = :lastname, mail = :mail, password = :password WHERE id = :id';
        $params = [
            'id' => $id,
            'firtsname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'mail' => $data['mail'],
            'password' => $data['password']

        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage();
        }
    }
    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $params = [
            'id' => $id
        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage();
        }
    }
}
