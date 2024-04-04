<?php
// On v siérifie la classe Db n'est pas déjà définie
if (!class_exists('Db')) {
    class Db {
        private $host;
        private $dbname;
        private $username;
        private $password;
        public $connection;

        public function __construct($host, $dbname, $username, $password) {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
        }

        public function connect() {
            try {
                $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }
        }
        
    }
}

// Instanciation de la classe Db et appel de la méthode connect
$Db = new Db('localhost', 'projetGMAE', 'root', 'root');
$Db->connect();
?>
