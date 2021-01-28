<?php


class usuari
{
    private $userId;
    private $dni;
    private $nom;
    private $cognom;
    private $email;
    private $adreca;
    private $telefon;
    private $cp;
    private $pass;
    private $token;
    private $activation;

    /**
     * user constructor.
     * @param $dni
     * @param $nom
     * @param $cognom
     * @param $email
     * @param $adreca
     * @param $telefon
     * @param $cp
     * @param $pass
     * @param $token
     */
    public function __construct($dni, $nom, $cognom, $email, $adreca, $telefon, $cp, $pass, $token)
    {
        $this->dni = $dni;
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->email = $email;
        $this->adreca = $adreca;
        $this->telefon = $telefon;
        $this->cp = $cp;
        $this->pass = $pass;
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * @param mixed $cognom
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdreca()
    {
        return $this->adreca;
    }

    /**
     * @param mixed $adreca
     */
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed $telefon
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getActivation()
    {
        return $this->activation;
    }

    /**
     * @param mixed $activation
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;
    }




}