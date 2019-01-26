<?php

require_once "conexion.php";

class ModeloImpuestos{

	/*=============================================
	CREAR IMPUESTO PAGADO
	=============================================*/

	static public function mdlIngresarImpuesto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rfc, declaracion, periodo, mes, operacion, ejercicio, concepto, Impcargo, recargo, compensacion, cargo, pago) VALUES (:rfc, :declaracion, :periodo, :mes, :operacion, :ejercicio, :concepto, :Impcargo, :recargo, :compensacion, :cargo, :pago)");

		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":declaracion", $datos["declaracion"], PDO::PARAM_STR);
		$stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_INT);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":operacion", $datos["operacion"], PDO::PARAM_INT);
		$stmt->bindParam(":ejercicio", $datos["ejercicio"], PDO::PARAM_INT);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":Impcargo", $datos["Impcargo"], PDO::PARAM_INT);
		$stmt->bindParam(":recargo", $datos["recargo"], PDO::PARAM_INT);
		$stmt->bindParam(":compensacion", $datos["compensacion"], PDO::PARAM_INT);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_INT);
		$stmt->bindParam(":pago", $datos["pago"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR IMPUESTOS
	=============================================*/

	static public function mdlMostrarImpuestos($tabla, $item, $valor){

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
	EDITAR IMPUESTO
	=============================================*/

	static public function mdlEditarImpuesto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET rfc = :rfc, declaracion = :declaracion, periodo = :periodo, mes = :mes, operacion = :operacion, ejercicio = :ejercicio, concepto = :concepto, Impcargo = :Impcargo, recargo = :recargo, compensacion = :compensacion, cargo = :cargo, pago = :pago WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt->bindParam(":declaracion", $datos["declaracion"], PDO::PARAM_INT);
		$stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":operacion", $datos["operacion"], PDO::PARAM_STR);
		$stmt->bindParam(":ejercicio", $datos["ejercicio"], PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
		$stmt->bindParam(":Impcargo", $datos["Impcargo"], PDO::PARAM_STR);
		$stmt->bindParam(":recargo", $datos["recargo"], PDO::PARAM_STR);
		$stmt->bindParam(":compensacion", $datos["compensacion"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":pago", $datos["pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR IMPUESTO
	=============================================*/

	static public function mdlEliminarImpuesto($tabla, $datos){

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

	/*=============================================
	SUMAR EL TOTAL DE IMPUESTOS
	=============================================*/

	static public function mdlSumaTotalImpuestos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(pago) as neto FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
