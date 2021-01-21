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

        public function getGenderProduct($gender){
            
            $stmt = $this->db->prepare("SELECT IDprodotto, titolo, prezzo,immagine FROM prodotto WHERE sesso = ? OR sesso = 'U' ");
            $stmt->bind_param("s", $gender);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getEventsBySearch($search){
            $stmt=$this->db->prepare(" SELECT IDprodotto, titolo, prezzo, immagine FROM prodotto WHERE titolo LIKE ? ");
            $search="%".$search."%";
            $stmt->bind_param("s",$search);
            $stmt->execute();
            $result=$stmt->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            
            $stmt2=$this->db->prepare("SELECT p.IDprodotto, p.titolo, p.prezzo, p.immagine FROM prodotto as p, appartenenza as ap, sottocategoria as sc WHERE sc.nome LIKE ? AND sc.IDsottocategoria = ap.IDsottocategoria AND ap.IDprodotto = p.IDprodotto");
            $search="%".$search."%";
            $stmt2->bind_param("s",$search);
            $stmt2->execute();
            $result2=$stmt2->get_result();
            $result2 = $result2->fetch_all(MYSQLI_ASSOC);

            $arr = array_merge($result, $result2);
            return array_unique($arr,SORT_REGULAR);
        }

        
        public function checkLogin($email, $password){
            $stmt = $this->db->prepare("SELECT IDuser, email, nome FROM utente WHERE email = ? AND password = ? AND admin = 0");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

?>