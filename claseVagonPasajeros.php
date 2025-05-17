<?php 
include_once 'claseVagon.php';
class VagonPasajeros extends Vagon {
    //Attributos
    private $cantMaxPasajeros;
    private $cantTransportando;
    private $pesoPromedioPasajaeros;

    //Metodo constructor
    public function __construct($cantMaxPasajeros,$cantTransportando,$anioInstalacion,$largo,$ancho,$peso)
    {
        parent::__construct($anioInstalacion,$largo,$ancho,$peso);
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->cantTransportando=$cantTransportando;
        $this->pesoPromedioPasajaeros=50;
    }

    //Metodos de acceso
    //Getters 
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getCanTransportando(){
        return $this->cantTransportando;
    }
    public function getPesoPromedioPasajeros(){
        return $this->pesoPromedioPasajaeros;
    }

    //Setters
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    public function setCanTransportando($cantTransportando){
        $this->cantTransportando=$cantTransportando;
    }
    public function setPesoPromedioPasajeros($pesoPromedioPasajaeros){
        $this->pesoPromedioPasajaeros=$pesoPromedioPasajaeros;
    }

    //Metodo toString 
    public function __toString()
    {
        return "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros().
        "\nCantidad de pasajeros transportando: " . $this->getCanTransportando().
        "\nPeso promedio de pasajeros: " . $this->getPesoPromedioPasajeros();
    }
}