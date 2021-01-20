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

        public function getProductById($id){
            $stmt = $this->db->prepare("SELECT IDprodotto,titolo,prezzo,descrizione,immagine FROM prodotto WHERE IDprodotto = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSubCategories($id){
            $stmt = $this->db->prepare("SELECT subcat.IDsottocategoria, subcat.nome as nomesubc, cat.nome as nomec FROM sottocategoria as subcat, categoria as cat WHERE subcat.IDcategoria = ? AND cat.IDcategoria = subcat.IDcategoria");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSearchById($id){
            $stmt = $this->db->prepare("SELECT p.IDprodotto, p.titolo, p.prezzo, p.immagine FROM appartenenza as ap, prodotto as p WHERE ap.IDsottocategoria = ? AND ap.IDprodotto = p.IDprodotto");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAllProduct(){
            $stmt = $this->db->prepare("SELECT IDprodotto, titolo, prezzo, immagine FROM prodotto");
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

?>