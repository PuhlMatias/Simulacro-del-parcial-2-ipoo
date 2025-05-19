<?php
class Formacion {
    //Atributos 
    private $refObjLocomotora;
    private $colVagones;
    private $maximoDeVagones;

    //Metodo constructor 
    public function __construct($refObjLocomotora,$maximoDeVagones)
    {
        $this->refObjLocomotora=$refObjLocomotora;
        $this->maximoDeVagones=$maximoDeVagones;
        $this->colVagones=[];
    }

    //Metodos de acceso
    //Getters
    public function getRefObjLocomotora(){
        return $this->refObjLocomotora;
    }
    public function getColVagones(){
        return $this->colVagones;
    }
    public function getMaximoVagones(){
        return $this->maximoDeVagones;
    }

    //Setters
    public function setRefObjLocomotora($refObjLocomotora){
        $this->refObjLocomotora=$refObjLocomotora;
    }
    public function setColVagones($colVagones){
        $this->colVagones=$colVagones;
    }
    public function setMaximoVagones($maximoDeVagones){
        $this->maximoDeVagones=$maximoDeVagones;
    }

    //Metodo toString
    public function __toString()
    {
        $locomotora = "";
        foreach($this->getRefObjLocomotora() as $info){
            $locomotora .= $info . "\n";
        }

        $vagones = "";
        foreach($this->getColVagones() as $info2){
            $vagones .= $info2 . "\n";
        }


        return "\nInformacion de locomotora: " . $locomotora.
        "\nVagones: " . $vagones.
        "\nMaximo de vagones: " . $this->getMaximoVagones();
    }

    //Metodo que incropora a pasajeros a vagon
    public function incorporarPasajeroFormacion($cantPasajeros) {
        $valorRetornar = false;
        $i = 0;
        $coleccion = $this->getColVagones();
        $cantidad = count($coleccion);

        while ($i < $cantidad && !$valorRetornar) {
            $objVagon = $coleccion[$i];

            if (is_a($objVagon, 'VagonPasajeros')) {
                if ($objVagon->incorporarPasajeroVagon($cantPasajeros)) {
                    $valorRetornar = true;
                }
            }
            $i++;
        }

        return $valorRetornar;
    }


    //Metodo incorporar formacion
    public function incorporarVagonFormacion($objVagon) {
        $valorRetornar = false;

        if (count($this->getColVagones()) < $this->getMaximoVagones()) {
            $coleccion = $this->getColVagones();
            $coleccion[] = $objVagon;
            $this->setColVagones($coleccion);
            $valorRetornar = true;
        }

        return $valorRetornar;
    }

    //Metodo que retorna el promedio de pasajeros por vagon
    public function promedioPasajerosFormacion() {
        $coleccion = $this->getColVagones();
        $cantidadPasajeros = 0;
        $totalVagonesPasajeros = 0;

        foreach ($coleccion as $objVagon) {
            if (is_a($objVagon, 'VagonPasajeros')) {
                $cantidadPasajeros += $objVagon->getCanTransportando();
                $totalVagonesPasajeros += 1;
            }
        }

        if ($totalVagonesPasajeros > 0) {
            $promedio = $cantidadPasajeros / $totalVagonesPasajeros;
        } else {
            $promedio = 0;
        }

        return $promedio;
    }


    //Metodo que retorna el peso del vagon
    public function pesoFormacion(){
        $objLocomotora = $this->getRefObjLocomotora();
        $pesoLocomotora = $objLocomotora->getPeso();
        $coleccionVagones = $this->getColVagones();

        foreach($coleccionVagones as $objVagon){
            $pesoLocomotora += $objVagon->calcularPesoVagon();
        }

        return $pesoLocomotora;
    }

    //Metodo que retorna el primer vagon de la formacion auque no se encuentre completo
    public function retornarVagonSinCompletar() {
    $i = 0;
    $vagonIncompleto = null;
    $coleccion = $this->getColVagones();
    $cantidad = count($coleccion);

    while ($i < $cantidad && $vagonIncompleto === null) {
        $objVagon = $coleccion[$i];

        if (is_a($objVagon, 'VagonPasajeros')) {
            if ($objVagon->getCanTransportando() < $objVagon->getCantMaxPasajeros()) {
                $vagonIncompleto = $objVagon;
            }
        } elseif (is_a($objVagon, 'VagonCarga')) {
            if ($objVagon->getCargaTransportar() < $objVagon->getPesoMaxTransportar()) {
                $vagonIncompleto = $objVagon;
            }
        }

        $i++;
    }

    return $vagonIncompleto;
}

}