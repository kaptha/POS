<?php

require_once "conexion.php";

class ModeloEgresos{

	/*=============================================
	CREAR EGRESO
	=============================================*/

	static public function mdlIngresarEgreso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(emisor, fecha, lugar, metodo, forma, uso, trasladado, subtotal, total) VALUES (:emisor, :fecha, :lugar, :metodo, :forma, :uso, :trasladado, :subtotal, :total)");

		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_INT);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_INT);
		$stmt->bindParam(":uso", $datos["uso"], PDO::PARAM_STR);
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
	MOSTRAR EGRESOS
	=============================================*/

	static public function mdlMostrarEgresos($tabla, $item, $valor){

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
	EDITAR EGRESO
	=============================================*/

	static public function mdlEditarEgreso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET emisor = :emisor, fecha = :fecha, lugar = :lugar, metodo = :metodo, forma = :forma, uso = :uso, trasladado = :trasladado, subtotal = :subtotal, total = :total  WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_STR);
		$stmt->bindParam(":uso", $datos["uso"], PDO::PARAM_STR);
		$stmt->bindParam(":trasladado", $datos["trasladado"], PDO::PARAM_STR);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR EGRESO
	=============================================*/

	static public function mdlEliminarEgreso($tabla, $datos){

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
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function mdlMostrarSumaUsos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(uso) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	SUMAR EL TOTAL DE EGRESOS
	=============================================*/

	static public function mdlSumaTotalEgresos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(subtotal) as neto FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
