<?php
    class DatabaseHelper{

        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if($this->db->connect_error){
                die("Connessione al db fallita;");
            }
        }


        public function getCategories(){
            $stmt = $this->db->prepare("SELECT * FROM categoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getRandomProduct($n){
            $stmt = $this->db->prepare("SELECT IDprodotto, titolo, immagine FROM prodotto ORDER BY RAND() LIMIT ?");
            $stmt->bind_param('i',$n);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }

?>