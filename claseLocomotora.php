<?php
class Locomotora {
    //Atributos
    private $peso;
    private $velocidadMaxima;

    //Metodo constructor
    public function __construct($peso,$velocidadMaxima)
    {
        $this->peso=$peso;
        $this->velocidadMaxima=$velocidadMaxima;
    }

    //Medotos de acceso
    //Getters
    public function getPeso(){
        return $this->peso;
    }
    public function getVelocidadMaxima(){
        return $this->velocidadMaxima;
    }

    //Setters
    public function setPeso($peso){
        $this->peso=$peso;
    }
    public function setVelocidadMaxima($velocidadMaxima){
        $this->velocidadMaxima=$velocidadMaxima;
    }

    //Metodo toString
    public function __toString()
    {
        return "\nPeso de la locomotora: " . $this->getPeso().
        "\nVelocidad maxima: " . $this->getVelocidadMaxima();
    }
}