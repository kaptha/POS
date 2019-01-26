<?php

class ControladorPlantilla{
	  static public function ctrPlantilla(){

		include "vistas/plantilla.php";
	}

	// Mostrar rango de Fechas
	  static public function ctrRangoFechas($tabla,$fechaInicial,$fechaFinal){

		$respuesta=ModeloPlantilla::mdlRangoFechas($tabla,$fechaInicial,$fechaFinal);

		return $respuesta;
	}
}
