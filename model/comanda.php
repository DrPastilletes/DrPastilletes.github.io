<?php


class comanda
{
    private $idComanda;
    private $usuari;
    private $preuFinal;
    private $data;
    private $acabada;

    /**
     * comanda constructor.
     * @param $usuari
     * @param $preuFinal
     * @param $data
     * @param $acabada
     */
    public function __construct($usuari, $preuFinal, $data, $acabada)
    {
        $this->usuari = $usuari;
        $this->preuFinal = $preuFinal;
        $this->data = $data;
        $this->acabada = $acabada;
    }


    /**
     * @return mixed
     */
    public function getIdComanda()
    {
        return $this->idComanda;
    }

    /**
     * @param mixed $idComanda
     */
    public function setIdComanda($idComanda): void
    {
        $this->idComanda = $idComanda;
    }

    /**
     * @return mixed
     */
    public function getPreuFinal()
    {
        return $this->preuFinal;
    }

    /**
     * @param mixed $preuFinal
     */
    public function setPreuFinal($preuFinal): void
    {
        $this->preuFinal = $preuFinal;
    }

    /**
     * @return mixed
     */
    public function getAcabada()
    {
        return $this->acabada;
    }

    /**
     * @param mixed $acabada
     */
    public function setAcabada($acabada): void
    {
        $this->acabada = $acabada;
    }

    /**
     * @return mixed
     */
    public function getUsuari()
    {
        return $this->usuari;
    }

    /**
     * @param mixed $usuari
     */
    public function setUsuari($usuari): void
    {
        $this->usuari = $usuari;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }


}