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

        public function getWishlistProducts($iduser){
            $stmt = $this->db->prepare("SELECT p.IDprodotto, p.titolo, p.prezzo, p.immagine 
                                        FROM prodotto as p, in_wishlist as w
                                        WHERE p.IDprodotto = w.IDprodotto AND w.IDuser = ?");
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getCartProducts($iduser){
            $stmt = $this->db->prepare("SELECT p.IDprodotto, p.titolo, p.prezzo, p.immagine, p.descrizione,  c.quantita 
                                        FROM prodotto as p, in_carrello as c
                                        WHERE p.IDprodotto = c.IDprodotto AND c.IDuser = ?");
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertInWishlist($idprod, $iduser){
            $stmt = $this->db->prepare("INSERT INTO in_wishlist(IDprodotto, IDuser) VALUES (?, ?)");
            $stmt->bind_param("ss", $idprod, $iduser);
            return $stmt->execute();
        }

        public function insertInCart($idprod, $iduser){
            $stmt = $this->db->prepare("INSERT INTO in_carrello(IDprodotto, IDuser, quantita) VALUES (?, ?, 1)");
            $stmt->bind_param("ss", $idprod, $iduser);
            return $stmt->execute();
        }

        public function isInWishlist($iduser, $idprod) {
            $stmt = $this->db->prepare("SELECT IDprodotto, IDuser FROM in_wishlist WHERE IDprodotto = ? AND IDuser = ?");
            $stmt->bind_param("ss", $idprod, $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        public function checkLogin($email, $password){
            $stmt = $this->db->prepare("SELECT IDuser, email, nome FROM utente WHERE email = ? AND password = ? AND admin = 0");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkLoginAdmin($email, $password){
            $stmt = $this->db->prepare("SELECT IDuser, email, nome FROM utente WHERE email = ? AND password = ? AND admin = 1");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

            
        public function getUserByEmail($email){
            $query = "SELECT IDuser Password FROM utente WHERE email=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result -> fetch_assoc();
        }

        public function insertUser($codice, $nome, $cognome, $email, $password){
            $admin = 0;
            $stmt = $this->db->prepare("INSERT INTO utente(IDuser, email, password, nome, cognome, admin) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssi', $codice ,$email, $password, $nome, $cognome, $admin);
            return $stmt->execute();
        }

        public function deleteFromWishlist($idprod, $iduser){
            $stmt = $this->db->prepare("DELETE FROM in_wishlist WHERE IDprodotto = ? AND IDuser = ?");
            $stmt->bind_param("ss", $idprod, $iduser);
            return $stmt->execute();
        }

        public function deleteFromCart($idprod, $iduser){
            $stmt = $this->db->prepare("DELETE FROM in_carrello WHERE IDprodotto = ? AND IDuser = ?");
            $stmt->bind_param("ss", $idprod, $iduser);
            return $stmt->execute();
        }
    }

?>