<?php

require_once "conexion.php";

class ModeloNominas{

	/*=============================================
	CREAR Nomina
	=============================================*/

	static public function mdlIngresarNomina($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, rfc, email, contrato, regimen, fecha_inicio, perioricidad, estado, telefono, sueldo, isr, imss, otros, total) VALUES (:nombre, :rfc, :email, :contrato, :regimen, :fecha_inicio, :perioricidad, :estado, :telefono, :sueldo, :isr, :imss, :otros, :total)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":contrato", $datos["contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":regimen", $datos["regimen"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":perioricidad", $datos["perioricidad"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $datos["sueldo"], PDO::PARAM_INT);
		$stmt->bindParam(":isr", $datos["isr"], PDO::PARAM_INT);
		$stmt->bindParam(":imss", $datos["imss"], PDO::PARAM_INT);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_INT);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR EMPLEADOS
	=============================================*/

	static public function mdlMostrarNominas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	static public function mdlEditarNomina($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, rfc = :rfc, email = :email, contrato = :contrato, regimen = :regimen, fecha_inicio = :fecha_inicio, perioricidad = :perioricidad, estado = :estado, telefono = :telefono, sueldo = :sueldo, isr = :isr, imss = :imss, otros = :otros, total = :total WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":contrato", $datos["contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":regimen", $datos["regimen"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":perioricidad", $datos["perioricidad"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $datos["sueldo"], PDO::PARAM_INT);
		$stmt->bindParam(":isr", $datos["isr"], PDO::PARAM_INT);
		$stmt->bindParam(":imss", $datos["imss"], PDO::PARAM_INT);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_INT);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR EMPLEADO
	=============================================*/

	static public function mdlEliminarNomina($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

}
