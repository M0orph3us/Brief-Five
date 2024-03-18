<?php

final class Database
{
    // params
    private $db;

    // constructor
    public function __construct()
    {
        require __DIR__ . '/../config/configDB.php';
        $this->connexionDB($CONFIG);
    }
    // Methods

    private function connexionDB($CONFIG)
    {
        try {
            $dsn = "mysql:host=$CONFIG[DB_HOST];dbname=$CONFIG[DB_NAME]";
            $this->db = new PDO($dsn, $CONFIG['DB_USER'], $CONFIG['DB_MDP'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS]);
        } catch (PDOException $erreur) {
            echo "Connexion error : " . $erreur->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function closeConnection()
    {
        $this->db = null;
    }

    public function initDB()
    {
        $sql = file_get_contents('../SQL/initDB.sql');
        try {
            $request = $this->db->prepare($sql);
            $request->execute();
        } catch (PDOException $e) {
            "Impossible to fill the database : " . $e->getMessage();
        }
    }
}
