<?php
require_once 'conexion.php';

class ModeloPlantilla{
	// Método para mostrar el Rango de Fechas de una tabla
	static public function mdlRangoFechas($tabla,$fechaInicial,$fechaFinal){
		if($fechaInicial=="null"){
			$sql="SELECT * FROM $tabla";
			$stmt=Conexion::conectar()->prepare($sql);
			$stmt->execute();
			# Retornamos un fetchAll por ser más de una línea la que necesitamos devolver
			return $stmt->fetchAll();}
		else if($fechaInicial==$fechaFinal){
			$sql="SELECT * FROM $tabla WHERE fecha like '%$fechaInicial%'";
			$stmt=Conexion::conectar()->prepare($sql);
			$stmt->bindParam(":fecha",$fechaInicial,PDO::PARAM_STR);
			$stmt->execute();
			# Retornamos un fetchAll por ser más de una línea la que necesitamos devolver
			return $stmt->fetchAll();
		}
		else{
			$fechaActual=new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualmasUno=$fechaActual->format("Y-m-d");

			$fechaFinal2=new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalmasUno=$fechaFinal2->format("Y-m-d");
			$sql="SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalmasUno'";
			$stmt=Conexion::conectar()->prepare($sql);
			$stmt->execute();
			# Retornamos un fetchAll por ser más de una línea la que necesitamos devolver
			return $stmt->fetchAll();
		}
		$stmt=null;
	}
}
