<?php
 abstract class Vagon {
    //Atributos
    private $anioInstalacion;
    private $largo;
    private $ancho;
    private $pesoVagon;

    //Metodo constructor
    public function __construct($anioInstalacion,$largo,$ancho,$pesoVagon)
    {
        $this->anioInstalacion=$anioInstalacion;
        $this->largo=$largo;
        $this->ancho=$ancho;
        $this->pesoVagon=$pesoVagon;
    }

    //Metodos de acceso
    //Getters
    public function getAnioInstalacion(){
        return $this->anioInstalacion;
    }
    public function getLargo(){
        return $this->largo;
    }
    public function getAncho(){
        return $this->ancho;
    }
    public function getPesoVagon(){
        return $this->pesoVagon;
    }

    //Setters
    public function setAnioInstalacion($anioInstalacion){
        $this->anioInstalacion=$anioInstalacion;
    }
    public function setLargo($largo){
        $this->largo=$largo;
    }
    public function setAncho($ancho){
        $this->ancho=$ancho;
    }
    public function setPesoVagon($pesoVagon){
        $this->pesoVagon=$pesoVagon;
    }

    //Metodo toString
    public function __toString()
    {
        return "\nAño de instalacion: " . $this->getAnioInstalacion().
        "\nLargo del vagon: " . $this->getLargo().
        "\nAncho del vagon: " . $this->getAncho().
        "\nPeso del vagon: " . $this->getPesoVagon();
    }

    //Metodo que se redefine en las clases hijas
    abstract public function calcularPesoVagon();
 }
