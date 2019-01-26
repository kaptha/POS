<?php

require_once "conexion.php";

class ModeloIngresos{

	/*=============================================
	CREAR INGRESO
	=============================================*/

	static public function mdlIngresarIngreso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(receptor, fecha, lugar, tipo, metodo, forma, trasladado, subtotal, total) VALUES (:receptor, :fecha, :lugar, :tipo, :metodo, :forma, :trasladado, :subtotal, :total)");

		$stmt->bindParam(":receptor", $datos["receptor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_INT);
		$stmt->bindParam(":trasladado", $datos["trasladado"], PDO::PARAM_INT);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_INT);
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
	MOSTRAR INGRESOS
	=============================================*/

	static public function mdlMostrarIngresos($tabla, $item, $valor){

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
	EDITAR INGRESO
	=============================================*/

	static public function mdlEditarIngreso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET receptor = :receptor, fecha = :fecha, lugar = :lugar, tipo = :tipo, metodo = :metodo, forma = :forma, trasladado = :trasladado, subtotal = :subtotal, total = :total  WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":receptor", $datos["receptor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_STR);
		$stmt->bindParam(":trasladado", $datos["trasladado"], PDO::PARAM_INT);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_INT);
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
	ELIMINAR INGRESO
	=============================================*/

	static public function mdlEliminarIngreso($tabla, $datos){

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
	SUMAR EL TOTAL DE INGRESOS
	=============================================*/

	static public function mdlSumaTotalIngresos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(subtotal) as neto FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
