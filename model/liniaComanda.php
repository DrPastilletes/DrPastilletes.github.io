<?php


class liniaComanda
{
private $idLinia;
private $producte;
private $quantitat;
private $preuFinal;
private $comanda;

    /**
     * liniaComanda constructor.
     * @param $producte
     * @param $quantitat
     * @param $preuFinal
     * @param $comanda
     */
    public function __construct($producte, $quantitat, $preuFinal, $comanda)
    {
        $this->producte = $producte;
        $this->quantitat = $quantitat;
        $this->preuFinal = $preuFinal;
        $this->comanda = $comanda;
    }


    /**
     * @return mixed
     */
    public function getIdLinia()
    {
        return $this->idLinia;
    }

    /**
     * @param mixed $idLinia
     */
    public function setIdLinia($idLinia): void
    {
        $this->idLinia = $idLinia;
    }

    /**
     * @return mixed
     */
    public function getProducte()
    {
        return $this->producte;
    }

    /**
     * @param mixed $producte
     */
    public function setProducte($producte): void
    {
        $this->producte = $producte;
    }

    /**
     * @return mixed
     */
    public function getQuantitat()
    {
        return $this->quantitat;
    }

    /**
     * @param mixed $quantitat
     */
    public function setQuantitat($quantitat): void
    {
        $this->quantitat = $quantitat;
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
    public function getComanda()
    {
        return $this->comanda;
    }

    /**
     * @param mixed $comanda
     */
    public function setComanda($comanda): void
    {
        $this->comanda = $comanda;
    }


}