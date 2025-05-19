<?php
include_once 'claseVagon.php';
class VagonCarga extends Vagon {
    //Atibutos
    private $pesoMaxTransportar;
    private $cargaTransportada;
    private $indice;

    //Metodo constructor 
    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $pesoMaxTransportar, $cargaTransportada) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        $this->pesoMaxTransportar = $pesoMaxTransportar;
        $this->cargaTransportada = $cargaTransportada;
        $this->indice = 0.20 * $cargaTransportada;
    }

    //Metodos de acceso 
    //Getters
    public function getPesoMaxTransportar(){
        return $this->pesoMaxTransportar;
    }
    public function getCargaTransportar(){
        return $this->cargaTransportada;
    }
    public function getIndice(){
        return $this->indice;
    }

    //Setters
    public function setPesoMaxTransportar($pesoMaxTransportar){
        $this->pesoMaxTransportar = $pesoMaxTransportar;
    }
    public function setCargaTransportar($cargaTransportada){
        $this->cargaTransportada = $cargaTransportada;
    }
    public function setIndice($indice){
        $this->indice = $indice;
    }

    //Metodo toString 
    public function __toString()
    {
        return "\nPeso maximo a transportar: " . $this->getPesoMaxTransportar()."\nCarga maxima a transportar: " . $this->getCargaTransportar();
    }

    //Metodo para calcular el peso del vagon
    public function calcularPesoVagon() {
        return $this->getPesoVagon() + $this->getCargaTransportar() + $this->getIndice();
    }

    //Metodo incorporar carga vagon y actualiza variables
    public function incorporarCargaVagon($cantCarga){
        $valorRetornar = false;
        $cantidadNueva = $this->getCargaTransportar() + $cantCarga;

        if ($cantidadNueva <= $this->getPesoMaxTransportar()) {
            $this->setCargaTransportar($cantidadNueva);

            $pesoNuevo = $this->calcularPesoVagon();
            $this->setPesoVagon($pesoNuevo);

            $valorRetornar = true;
        } 
        return $valorRetornar;
    }
}