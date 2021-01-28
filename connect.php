<?php

class connect
{
    private $host;
    private $db;
    private $dsn;
    private $user;
    private $pass;
    public $conexio;

    public function __construct()
    {
        $this->host = 'botiga.cnkb34vhn5yb.us-east-1.rds.amazonaws.com';
        $this->db = "botiga";
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        $this->user = 'root';
        $this->pass = "finslapolladequeemhackegin:)";
    }

    public function openConnection()
    {
        try {
            $this->conexio = new PDO($this->dsn, $this->user, $this->pass);
            return $this->conexio;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
            return null;
        }

    }

    public function closeConnection()
    {
        try {
            $this->conexio = null;
            return $this->conexio;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
            return null;
        }

    }

    public function getUsers()
    {
        try {
            $statement = $this->conexio->query("SELECT * FROM users");
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getTokenByIdUsuari($idUsuari)
    {
        try {
            $result = $this->conexio->query("SELECT Token FROM users WHERE id=$idUsuari");
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function activarUser($idUsuari)
    {
        try {
            $result = $this->conexio->query("UPDATE users SET activation=1 WHERE id=$idUsuari");
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function ferUserAdmin($idUsuari)
    {
        try {
            $result = $this->conexio->query("UPDATE users SET activation=2 WHERE id=$idUsuari");
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function ferUserNormal($idUsuari)
    {
        try {
            $result = $this->conexio->query("UPDATE users SET activation=1 WHERE id=$idUsuari");
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function canviarContrasenya($id, $passwordUser)
    {
        try {
            $querySql = "UPDATE users SET Contrasenya=:passwordUser WHERE id=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                    ':passwordUser' => $passwordUser
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function modificarUsuari($usuari, $id)
    {
        try {
            $querySql = "UPDATE users SET Nom=:nom, Cognoms=:cognom, DNI=:dni,
                         Correu=:email, Adreca=:adreca, CodiPostal=:cp,
                         telefon=:telefon, Contrasenya=:password, Token=:token WHERE id=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                    ':dni' => $usuari->getDni(),
                    ':nom' => $usuari->getNom(),
                    ':cognom' => $usuari->getCognom(),
                    ':email' => $usuari->getEmail(),
                    ':adreca' => $usuari->getAdreca(),
                    ':cp' => $usuari->getCp(),
                    ':telefon' => $usuari->getTelefon(),
                    ':password' => $usuari->getPass(),
                    ':token' => $usuari->getToken()
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function modificarMail($correu, $id)
    {
        try {
            $querySql = "UPDATE users SET Correu=:email, activation=0 WHERE id=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                    ':email' => $correu
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function deleteUserById($id)
    {
        try {
            $querySql = "DELETE FROM users WHERE id=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function addUser($usuari)
    {

        try {
            $sql = "INSERT INTO users(id,Nom,Cognoms,DNI,Correu,Adreca,Contrasenya,CodiPostal,Token,telefon,activation) 
                    VALUES (null,:nom,:cognom,:dni,:email,:adreca,:password,:cp,:token,:telefon,0)";
            $statement = $this->conexio->prepare($sql);

            $dni = $usuari->getDni();
            $nom = $usuari->getNom();
            $cognoms = $usuari->getCognom();
            $email = $usuari->getEmail();
            $adreca = $usuari->getAdreca();
            $cp = $usuari->getCp();
            $telefon = $usuari->getTelefon();
            $pass = $usuari->getPass();
            $token = $usuari->getToken();

            $statement->bindParam(':dni', $dni);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':cognom', $cognoms);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':adreca', $adreca);
            $statement->bindParam(':cp', $cp);
            $statement->bindParam(':telefon', $telefon);
            $statement->bindParam(':password', $pass);
            $statement->bindParam(':token', $token);

            if ($statement->execute()) {
                $usuari->setUserId($this->conexio->lastInsertId());
                return $usuari;
            } else {
                return null;
            }
        } catch (PDOException $ex) {

        }
    }

    public function getUserById($id)
    {
        try {
            $query = "SELECT * FROM users WHERE id=:id";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':id' => $id
                )
            );
            $result = $statement->fetch();

            $user = new Usuari("a", "a", "a", "a", "a", "123", "123", "a", "a");
            $user->setUserId($result['id']);
            $user->setEmail($result['Correu']);
            $user->setCognom($result['Cognoms']);
            $user->setNom($result['Nom']);
            $user->setPass($result['Contrasenya']);
            $user->setAdreca($result['Adreca']);
            $user->setTelefon($result['telefon']);
            $user->setDni($result['DNI']);
            $user->setToken($result['Token']);
            $user->setActivation($result['activation']);
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getUserByMail($correu)
    {
        try {
            $query = "SELECT * FROM users WHERE Correu=:correu";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':correu' => $correu
                )
            );
            $result = $statement->fetch();

            $user = new Usuari("a", "a", "a", "a", "a", "123", "123", "a", "a");
            $user->setUserId($result['id']);
            $user->setEmail($result['Correu']);
            $user->setCognom($result['Cognoms']);
            $user->setNom($result['Nom']);
            $user->setPass($result['Contrasenya']);
            $user->setAdreca($result['Adreca']);
            $user->setTelefon($result['telefon']);
            $user->setDni($result['DNI']);
            $user->setToken($result['Token']);
            $user->setActivation($result['activation']);
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function checkDni($dni)
    {
        try {
            $query = "SELECT * FROM users WHERE DNI=:dni";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':dni' => $dni
                )
            );

            $result = $statement->fetch();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function checkEmail($email)
    {
        try {
            $query = "SELECT * FROM users WHERE Correu=:email";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':email' => $email
                )
            );

            $result = $statement->fetch();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }

    }

    public function addProduct($prod)
    {

        try {
            $sql = "INSERT INTO product(idProducte,nomProducte,descripcio,preu,stock,img,keyImg)
                    VALUES (null,:nomProducte,:descripcio,:preu,:stock,:img,:keyImg)";
            $statement = $this->conexio->prepare($sql);

            $nomProducte = $prod->getNomProducte();
            $descripcio = $prod->getDescripcio();
            $preu = $prod->getPreu();
            $stock = $prod->getStock();
            $img = $prod->getImg();
            $key = $prod->getKey();

            $statement->bindParam(':nomProducte', $nomProducte);
            $statement->bindParam(':descripcio', $descripcio);
            $statement->bindParam(':preu', $preu);
            $statement->bindParam(':stock', $stock);
            $statement->bindParam(':img', $img);
            $statement->bindParam(':keyImg', $key);


            if ($statement->execute()) {
                $prod->setIdProducte($this->conexio->lastInsertId());
                return $prod;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function getProds()
    {
        try {
            $statement = $this->conexio->query("SELECT * FROM product");
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getProdById($id)
    {
        try {
            $query = "SELECT * FROM product WHERE idProducte=:id";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':id' => $id
                )
            );
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function modificarProd($prod, $id)
    {
        try {
            $querySql = "UPDATE product SET nomProducte=:nom, descripcio=:descripcio, preu=:preu,
                         stock=:stock, img=:img, keyImg=:keyImg WHERE idProducte=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                    ':preu' => $prod->getPreu(),
                    ':nom' => $prod->getNomProducte(),
                    ':descripcio' => $prod->getDescripcio(),
                    ':stock' => $prod->getStock(),
                    ':img' => $prod->getImg(),
                    ':keyImg' => $prod->getKey()
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function modificarQuantitatProd($id)
    {
        try {
            $querySql = "UPDATE product SET stock=0 WHERE idProducte=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id
                )
            );

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function deleteProdById($id)
    {
        try {
            $querySql = "DELETE FROM product WHERE idProducte=:id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(
                array(
                    ':id' => $id,
                ));

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function addProdToCart($liniaComanda)
    {

        try {
            $sql = "INSERT INTO liniaComanda(idLinia,producte,quantitat,preuFinal,comanda) 
                    VALUES (null,:prod,:quantitat,:preuFinal,:comanda)";
            $statement = $this->conexio->prepare($sql);

            $prod = intval($liniaComanda->getProducte());
            $quantitat = intval($liniaComanda->getQuantitat());
            $preuFinal = floatval($liniaComanda->getPreuFinal());
            $comanda = intval($liniaComanda->getComanda());

            $statement->bindParam(':prod', $prod);
            $statement->bindParam(':quantitat', $quantitat);
            $statement->bindParam(':preuFinal', $preuFinal);
            $statement->bindParam(':comanda', $comanda);

            if ($statement->execute()) {
                $liniaComanda->setIdLinia($this->conexio->lastInsertId());
                return $liniaComanda;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function addCart($comanda)
    {
        try {
            $sql = "INSERT INTO comanda(idComanda,preuFinal,acabada,usuari,dataFi) 
                    VALUES (null,:preuFinal,:acabada,:usuari,:dataFi)";
            $statement = $this->conexio->prepare($sql);

            $usuari = $comanda->getUsuari();
            $acabada = $comanda->getAcabada();
            $preuFinal = $comanda->getPreuFinal();
            $data = $comanda->getData();

            $statement->bindParam(':usuari', $usuari);
            $statement->bindParam(':acabada', $acabada);
            $statement->bindParam(':preuFinal', $preuFinal);
            $statement->bindParam(':dataFi', $data);

            if ($statement->execute()) {
                $comanda->setIdComanda($this->conexio->lastInsertId());
                return $comanda;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function addLineToCart($idLiniaComanda, $idComanda)
    {
        try {
            $sql = "INSERT INTO Comanda_linia(idComanda,idLinia) 
                    VALUES (:comanda,:liniaComanda)";
            $statement = $this->conexio->prepare($sql);

            $statement->bindParam(':comanda', $idComanda);
            $statement->bindParam(':liniaComanda', $idLiniaComanda);

            $result = $statement->execute();

            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function comprovarComandes($idUsuari)
    {
        try {
            $id = intval($idUsuari);
            $statement = $this->conexio->query("SELECT * FROM comanda WHERE usuari=$id AND acabada='0'"); //WHERE usuari=:idUsuari AND acabada='0'
            $statement->bindParam(':idUsuari', $id);
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function comprovarLiniesComandes($idComanda, $idProducte)
    {
        try {
            $idCom = intval($idComanda);
            $idProd = intval($idProducte);
            $statement = $this->conexio->query("SELECT * FROM liniaComanda WHERE comanda=$idCom AND producte=$idProd"); //WHERE usuari=:idUsuari AND acabada='0'
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function modificarQuantitatLinies($quantitat, $preuFinal, $id)
    {
        try {
            $querySql = "UPDATE liniaComanda SET quantitat=$quantitat, preuFinal=$preuFinal WHERE idLinia=$id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute();

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function reduirQuantitatProdcutes($quantitat, $id)
    {
        try {
            $querySql = "UPDATE product SET stock=$quantitat WHERE idProducte=$id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute();

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function acabarComanda($preuFinal, $id)
    {
        try {
            $querySql = "UPDATE comanda SET preuFinal=$preuFinal, acabada=1 WHERE idComanda=$id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute();

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function deleteLineById($id)
    {
        try {
            $querySql = "DELETE FROM liniaComanda WHERE idLinia=$id";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute();

        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getComandLines($idComanda)
    {
        try {
            $id = intval($idComanda);
            $statement = $this->conexio->query("SELECT * FROM liniaComanda WHERE comanda=$id"); //WHERE usuari=:idUsuari AND acabada='0'
            $statement->bindParam(':idUsuari', $id);
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getCarts()
    {
        try {
            $statement = $this->conexio->query("SELECT * FROM comanda");
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getCartsByUser($id)
    {
        try {
            $statement = $this->conexio->query("SELECT * FROM comanda WHERE usuari=$id AND acabada='1'");
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }

    public function getComandById($id)
    {
        try {
            $query = "SELECT * FROM comanda WHERE idComanda=:id";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':id' => $id
                )
            );
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
        }
    }
}

?>