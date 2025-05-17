<?php 
include_once 'claseVagon.php';
class VagonPasajeros extends Vagon {
    //Attributos
    private $cantMaxPasajeros;
    private $cantTransportando;
    private $pesoPromedioPasajeros;

    //Metodo constructor
    public function __construct($cantMaxPasajeros,$cantTransportando,$anioInstalacion,$largo,$ancho,$peso)
    {
        parent::__construct($anioInstalacion,$largo,$ancho,$peso);
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->cantTransportando=$cantTransportando;
        $this->pesoPromedioPasajeros=50;
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
        return $this->pesoPromedioPasajeros;
    }

    //Setters
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    public function setCanTransportando($cantTransportando){
        $this->cantTransportando=$cantTransportando;
    }
    public function setPesoPromedioPasajeros($pesoPromedioPasajaeros){
        $this->pesoPromedioPasajeros=$pesoPromedioPasajaeros;
    }

    //Metodo toString 
    public function __toString()
    {
        return "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros().
        "\nCantidad de pasajeros transportando: " . $this->getCanTransportando().
        "\nPeso promedio de pasajeros: " . $this->getPesoPromedioPasajeros();
    }

    //Metodo para calcular el peso del vagon
    public function calcularPeso() {
        return $this->getPesoVagon() + ($this->getCanTransportando() * $this->getPesoPromedioPasajeros());
    }


    //Metodo que recibe una cantidad de pasajeros y actualiza valores
    public function incorporarPasajeroVagon($cantPasajeros) {
        $valorRetornar = false;
        $cantidadNueva = $this->getCanTransportando() + $cantPasajeros;

        if ($cantidadNueva <= $this->getCantMaxPasajeros()) {
            $this->setCanTransportando($cantidadNueva);

            $pesoNuevo = $this->getPesoVagon() + ($this->getCanTransportando()* $this->getPesoPromedioPasajeros());
            $this->setPesoVagon($pesoNuevo);

            $valorRetornar = true;
        } 
        return $valorRetornar;
    }
}