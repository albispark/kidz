<?php
    class DatabaseHelper{

        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if($this->db->connect_error){
                die("Connessione al db fallita;");
            }
        }

        public function getSubCategories(){
            $stmt = $this->db->prepare("SELECT * FROM sottocategoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        public function getSubCategoriesById($id){
            $stmt = $this->db->prepare("SELECT sc.nome as nomesubc, sc.IDsottocategoria, c.nome as nomec FROM sottocategoria as sc, categoria as c WHERE c.IDcategoria = sc.IDcategoria AND c.IDcategoria = ?");
            $stmt->bind_param('s',$id);
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
            //$stmt = $this->db->prepare("SELECT IDprodotto,titolo,prezzo,descrizione,immagine FROM prodotto WHERE IDprodotto = ?");
            $stmt = $this->db->prepare("SELECT * FROM prodotto WHERE IDprodotto = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getProductSubCategories($id){
            //$stmt = $this->db->prepare("SELECT subcat.IDsottocategoria, subcat.nome as nomesubc, cat.nome as nomec FROM //sottocategoria as subcat, categoria as cat WHERE subcat.IDcategoria = ? AND cat.IDcategoria = subcat.IDcategoria");
            $stmt = $this->db->prepare("SELECT IDsottocategoria FROM appartenenza WHERE IDprodotto = ?");
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

        public function getEventsAdminBySearch($search){
            $stmt=$this->db->prepare("SELECT IDprodotto, titolo, prezzo, immagine FROM prodotto WHERE titolo LIKE ? OR IDprodotto LIKE ?");
            $cod = $search;
            $search="%".$search."%";
            $stmt->bind_param("ss",$search,$cod);
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

        public function deleteProductFromCart($iduser,$idprod){
            $stmt = $this->db->prepare("DELETE FROM in_carrello WHERE IDprodotto = ? AND IDuser = ?");
            $stmt->bind_param("ss", $idprod, $iduser);
            return $stmt->execute();
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
            $stmt = $this->db->prepare("SELECT IDuser, email, nome, cognome FROM utente WHERE email = ? AND password = ? AND admin = 0");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function checkLoginAdmin($email, $password){
            $stmt = $this->db->prepare("SELECT IDuser, email, nome, cognome FROM utente WHERE email = ? AND password = ? AND admin = 1");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
            
        public function getUserByEmail($email){
            $query = "SELECT IDuser,password,salt FROM utente WHERE email=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result -> fetch_assoc();
        }

        public function insertUser($codice, $nome, $cognome, $email, $password,$salt){
            $admin = 0;
            $stmt = $this->db->prepare("INSERT INTO utente(IDuser, email, password, nome, cognome, admin, salt) VALUES (?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param('sssssis', $codice ,$email, $password, $nome, $cognome, $admin, $salt);
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

        public function getCategories(){
            $stmt = $this->db->prepare("SELECT * FROM categoria");
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertProduct($idprod, $titolo, $descrizione, $prezzo, $quantita, $taglia, $sesso, $eta, $imgarticolo){
            $query = "INSERT INTO prodotto (IDprodotto, titolo, prezzo, quantita_scorta, descrizione, taglia, eta, immagine, sesso) VALUES (?, ?, ?, ?, ?, ?, ?, ? , ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssdississ',$idprod, $titolo, $prezzo, $quantita,$descrizione, $taglia, $eta, $imgarticolo, $sesso);
            $stmt->execute();
            
            return $stmt->insert_id;

        }

        public function insertCategoryOfProduct($idprod, $idcat){
            $query = "INSERT INTO appartenenza (IDprodotto, IDsottocategoria) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$idprod, $idcat);
            return $stmt->execute();
        }

        public function getReadMessages($iduser){
            $stmt = $this->db->prepare("SELECT r.visualizzato, n.titolo, n.messaggio, n.data  FROM ricezione as r, notifica as n WHERE r.IDnotifica = n.IDnotifica AND r.IDuser = ? AND r.visualizzato = 1");
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function setMessagesRead($iduser){
            $stmt = $this->db->prepare("UPDATE ricezione SET visualizzato = 1 WHERE visualizzato = 0 AND IDuser = ?");
            $stmt->bind_param('s',$iduser);
            return $stmt->execute();
        }

        public function getUnreadMessages($iduser){
            $stmt = $this->db->prepare("SELECT r.visualizzato, n.titolo, n.messaggio, n.data  FROM ricezione as r, notifica as n WHERE r.IDnotifica = n.IDnotifica AND r.IDuser = ? AND r.visualizzato = 0");
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function deleteCategoriesOfProduct($idprod){
            $stmt = $this->db->prepare("DELETE FROM appartenenza WHERE IDprodotto = ?");
            $stmt->bind_param('s',$idprod);
            return $stmt->execute();
        }

        public function updateProduct($idprod, $titolo, $descrizione, $prezzo, $quantita, $taglia, $sesso, $eta, $imgarticolo){
            $stmt = $this->db->prepare("UPDATE prodotto SET IDprodotto = ?, titolo = ?, prezzo = ? , quantita_scorta = ?, descrizione = ?, taglia = ?, eta = ?, immagine = ?, sesso = ? WHERE IDprodotto = ?");
            $stmt->bind_param('ssdississs',$idprod, $titolo, $prezzo, $quantita,$descrizione, $taglia, $eta, $imgarticolo, $sesso,$idprod);
            return $stmt->execute();
        }

        public function deleteProduct($idprod){
            $stmt = $this->db->prepare("DELETE FROM prodotto WHERE IDprodotto = ?");
            $stmt->bind_param('s',$idprod);
            return $stmt->execute();
        }

        public function notificaBenveuto($iduser){
            $query = "INSERT INTO ricezione (IDuser, IDnotifica, visualizzato) VALUES (?, 'BENVENU', 0)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$iduser);
            return $stmt->execute();
        }

        public function creaNotificaAcquisto($idnotif, $msg){
            $query = "INSERT INTO notifica (IDnotifica, titolo, messaggio, data) VALUES (?, 'ORDINE EFFETTUATO', ? , now())";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$idnotif, $msg);
            return $stmt->execute();
        }

        public function creaNotificaIscritti($idnotif, $msg){
            $query = "INSERT INTO notifica (IDnotifica, titolo, messaggio, data) VALUES (?, 'UTENTI ISCRITTI', ? , now())";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$idnotif, $msg);
            return $stmt->execute();
        }

        public function notificaAcquisto($iduser, $idnotif){
            $query = "INSERT INTO ricezione (IDuser, IDnotifica, visualizzato) VALUES (?, ?, 0)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$iduser, $idnotif);
            return $stmt->execute();
        }
        public function getNotifica($idnotif){
            $stmt = $this->db->prepare("SELECT titolo, messaggio, data FROM notifica WHERE IDnotifica = ? ");
            $stmt->bind_param("s", $idnotif);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumberOfCartProduct($idUser){
            $stmt = $this->db->prepare("SELECT c.quantita, p.prezzo FROM in_carrello as c, prodotto as p WHERE c.IDUser = ? AND c.IDprodotto = p.IDprodotto");
            $stmt->bind_param("s", $idUser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function updateQuantityInCart($idprod,$iduser,$q){
            $stmt = $this->db->prepare("UPDATE in_carello SET quantita = (quantita - ?) WHERE IDprodotto = ?AND IDuser = ?");
            $stmt->bind_param('iss',$q,$idprod,$iduser);
            return $stmt->execute();
        }

        public function getNumberOfSubscriber(){
            $stmt = $this->db->prepare("SELECT IDuser FROM utente WHERE admin = 0");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAdmin(){
            
            $stmt = $this->db->prepare("SELECT IDuser FROM utente WHERE admin = 1");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }


    }

?>