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
        $sql = "INSERT INTO users (firstname, lastname, mail, password) VALUE(:firstname, :lastname, :mail, :password)";
        try {

            $params = [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'mail' => $data['mail'],
                'password' => $data['password']
            ];

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();


            $user = new Users($params);
            return $user ? $user : null;
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }

    /**
     * @param string $uuid
     * @return mixed | null
     */
    public function readOne(string $uuid)
    {
        $sql = 'SELECT * FROM users WHERE uuid = 0x11eee6399893e6568a1600ff64196eed';
        $params = [
            'uuid' => $uuid
        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            // $result = $stmt->setFetchMode(PDO::FETCH_CLASS, Users::class);
            $result = $stmt->fetch();

            $stmt->closeCursor();
            var_dump('test3', $result->getMail());
            die;

            return $result;
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }

    /**
     * @return array
     */
    public function readAll(): array
    {
        $sql = "SELECT * FROM users";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            $stmt->closeCursor();
            // var_dump($result[1]->getMail());
            var_dump($result[1]->mail);
            return $result;
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }
    /**
     * @param string $uuid
     * @param array<string, mixed> $data
     * @return void
     */
    public function update(string $uuid, array $data): void
    {
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, mail = :mail, password = :password WHERE uuid = UUID_TO_BIN(:uuid)';
        $params = [
            'uuid' => $uuid,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'mail' => $data['mail'],
            'password' => $data['password']

        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }
    /**
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid): void
    {
        $sql = 'DELETE FROM users WHERE uuid = UUID_TO_BIN(:uuid)';
        $params = [
            'uuid' => $uuid
        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $stmt->closeCursor();
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }
    /**
     * @param string $mail
     * @return string | null
     */

    public function getUuid(string $mail): ?string
    {
        $sql = 'SELECT BIN_TO_UUID(uuid) AS uuid FROM users WHERE mail = :mail';
        $params = [
            'mail' => $mail
        ];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_COLUMN);
            $stmt->closeCursor();

            if ($result) {
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            throw new Exception('Error: ' . $error->getMessage());
        }
    }
}
