<?php
include_once 'Partido.php';
class Torneo{
    private $coleccionPartidos;
    private $importePremio;

    public function __construct($colPartidos, $impPremio){
        $this->coleccionPartidos = $colPartidos;
        $this->importePremio;
    }

    public function getColeccionPartidos(){
        return $this->coleccionPartidos;
    }

    public function getImportePremio(){
        return $this->importePremio;
    }

    public function setColeccionPartidos($coleccionPartidos){
        return $this->coleccionPartidos = $coleccionPartidos;
    }

    public function setImportePremio($importe){
        return $this->importePremio = $importe;
    }

    public function leerColeccion($coleccion){
        $resultado = "\n";
        foreach ($coleccion as $indice){
            $resultado .= $indice."\n";
        }

        return $resultado;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $coleccionPartidos = $this->getColeccionPartidos();
        $idPartido = count($coleccionPartidos)+1;
        $objPartida = new Partido ($idPartido, date("d/m/y"), $objEquipo2, 0, $objEquipo2, 0);
        $objCategoria1 = $objEquipo1->getObjCategoria();
        $objCategoria2 = $objEquipo2->getObjCategoria();
        $desCat1 = $objCategoria1->getDescripcion();
        $desCat2 = $objCategoria2->getDescripcion();
        if ($desCat1 == $desCat2){
            if(($objEquipo1->getCantJugadores()) == ($objEquipo2->getCantJugadores())){
                array_push($coleccionPartidos, $objPartida);
                $this->setColeccionPartidos($coleccionPartidos);
            }
        }
    }

    public function darGanadores($deporte){
        $coleccionPartidos = $this->getColeccionPartidos();
        $colPartidosDeporte = [];
        $colPartidosGanados = [];
        foreach ($coleccionPartidos as $partido){
            $objEquipo1 = $partido->getObjEquipo1();
            $categoria = $objEquipo1->getObjCategoria();
            if ($categoria->getDescripcion() == $deporte){
                array_push($colPartidosDeporte, $partido);
            }
        }
        foreach ($colPartidosDeporte as $objPartidos){
            $objE1 = $partido->getObjEquipo1();
            $objE2 = $partido->getObjEquipo2();
            $objGol2 = $objPartidos->getCantGolesE2();
            $objGol1 = $objPartidos->getCantGolesE1();
            if ($objGol1 < $objGol2){
                array_push($colPartidosGanados, $objE2);
            }else{
                array_push($colPartidosGanados, $objE1);
            }
        }
        return $colPartidosGanados;
    }

    public function calcularPremioPartido($OBJPartido){ // Falta de tiempo
    }

    public function __toString(){
        $colecPartidos = $this->getColeccionPartidos();
        $cartel = "PARTIDOS: \n";
        $cartel .= $this->leerColeccion($colecPartidos);
        $cartel .= "IMPORTE DEL PREMIO: \n";
        $cartel .= $this->getImportePremio()."\n";
    }
}