<?php
class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


 public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
 public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



 public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


 public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }




     public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
      public function getCoefBase(){
        return $this->coefBase;
    }

    public function darEquipoGanador(){
        $primerEquipo = $this->getObjEquipo1();
        $golesPrimerEquipo = $this->getCantGolesE1();
        $segundoEquipo = $this->getObjEquipo2();
        $golesSegundoEquipo = $this->getCantGolesE2();
        $colEquipos = [];
        if ($golesPrimerEquipo < $golesSegundoEquipo){
            array_push($colEquipos, $segundoEquipo); 
        }elseif($golesPrimerEquipo > $golesSegundoEquipo){
            array_push($colEquipos, $primerEquipo);
            }else{
                array_push($colEquipos, $primerEquipo);
                array_push($colEquipos, $segundoEquipo);
            }
            return $colEquipos;
        }


        public function coeficientePartido(){
            $coeficienteBase = $this->getCoefBase();
            $objEquipo1 = $this->getObjEquipo1();
            $objEquipo2 = $this->getObjEquipo2();
            $jugadores1 = $objEquipo1->getCantJugadores();
            $jugadores2 = $objEquipo2->getCantJugadores();
            $golesE1 = $this->getCantGolesE1();
            $golesE2 = $this->getCantGolesE2();
            $cantJugadores = $jugadores1 + $jugadores2;
            $cantGoles = $golesE1 + $golesE2;
            $valor = $coeficienteBase * $cantGoles * $cantJugadores;

            return $valor;
        }

public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
          $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }
}


?>