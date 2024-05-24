<?php

class PartidoBasquet extends Partido{
    private $cantidadInfracciones;

    public function __construct($cantInfracciones, $idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefBase){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefBase);

        $this->cantidadInfracciones = $cantInfracciones;
    }

    public function getCantInfracciones(){
        return  $this->cantidadInfracciones;
    }

    public function setCantInfracciones($cantInfracciones){
        $this->cantidadInfracciones = $cantInfracciones;
    }

    public function coeficientePartido(){
        $infracciones = $this->getCantInfracciones();
        $coefBase = parent::getCoefBase();
        $nuevoCoef = $coefBase - (0.75 * $infracciones);
        parent::setCoefBase($nuevoCoef);
    }

    public function __toString(){
        $cartelBasquet = parent::__toString();
        $cartelBasquet .= "Cantidad de infracciones: \n".$this->getCantInfracciones()."\n";
        return $cartelBasquet;
    }
}