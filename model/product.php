<?php


class product
{
private $idProducte;
private $nomProducte;
private $descripcio;
private $preu;
private $stock;
private $img;
private $key;

    /**
     * product constructor.
     * @param $nomProducte
     * @param $descripcio
     * @param $preu
     * @param $stock
     * @param $img
     */
    public function __construct($nomProducte, $descripcio, $preu, $stock, $img, $key)
    {
        $this->nomProducte = $nomProducte;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
        $this->stock = $stock;
        $this->img = $img;
        $this->key = $key;
    }


    /**
     * @return mixed
     */
    public function getIdProducte()
    {
        return $this->idProducte;
    }

    /**
     * @param mixed $idProducte
     */
    public function setIdProducte($idProducte)
    {
        $this->idProducte = $idProducte;
    }

    /**
     * @return mixed
     */
    public function getNomProducte()
    {
        return $this->nomProducte;
    }

    /**
     * @param mixed $nomProducte
     */
    public function setNomProducte($nomProducte)
    {
        $this->nomProducte = $nomProducte;
    }

    /**
     * @return mixed
     */
    public function getDescripcio()
    {
        return $this->descripcio;
    }

    /**
     * @param mixed $descripcio
     */
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;
    }

    /**
     * @return mixed
     */
    public function getPreu()
    {
        return $this->preu;
    }

    /**
     * @param mixed $preu
     */
    public function setPreu($preu)
    {
        $this->preu = $preu;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key): void
    {
        $this->key = $key;
    }



}