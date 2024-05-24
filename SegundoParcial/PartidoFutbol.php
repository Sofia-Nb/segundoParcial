<?php
include_once 'Partido.php';

class PartidoFutbol extends Partido{
    private $categoria;

    public function __construct($objCategoria, $idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefBase){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefBase);

        $this->categoria = $objCategoria;
    }

    public function getValor(){
        return $this->categoria;
    }


    public function setValor($objCategoria){
        $this->categoria = $objCategoria;
    }

    public function coeficientePartido(){
        $objEquipo1 = parent::getObjEquipo1();
        $objCategoria1 = $objEquipo1->getObjCategoria();
        $desCat1 = $objCategoria1->getDescripcion();
        if($desCat1 == "Coef_Menores"){
            parent::setCoefBase(0.13);
        }elseif($desCat1 == "Coef_juveniles"){  
            parent::setCoefBase(0.19);
    }elseif($desCat1 == "Coef_Mayores"){
        parent::setCoefBase(0.27);
    }
    }


    public function __toString(){
        $cartelFutbol = parent::__toString();
        $cartelFutbol .= "Cantidad de coeficientes: \n".$this->getValor()."\n";
        return $cartelFutbol;
    }
}