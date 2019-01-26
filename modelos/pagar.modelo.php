<?php

require_once "conexion.php";

class ModeloPagos{

	/*=============================================
	CREAR PAGO
	=============================================*/

	static public function mdlIngresarPago($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(emisor, fecha, lugar, metodo, uso, forma, trasladado, subtotal, total) VALUES (:emisor, :fecha, :lugar, :metodo, :uso, :forma, :trasladado, :subtotal, :total)");

		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_INT);
		$stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":uso", $datos["uso"], PDO::PARAM_STR);
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
	MOSTRAR PAGOS
	=============================================*/

	static public function mdlMostrarPagos($tabla, $item, $valor){

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
	EDITAR PAGO
	=============================================*/

	static public function mdlEditarPago($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET emisor = :emisor, fecha = :fecha, lugar = :lugar, uso = :uso, metodo = :metodo, forma = :forma, trasladado = :trasladado, subtotal = :subtotal, total = :total  WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":emisor", $datos["emisor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
	  $stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
		$stmt->bindParam(":uso", $datos["uso"], PDO::PARAM_STR);
		$stmt->bindParam(":forma", $datos["forma"], PDO::PARAM_STR);
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
	ELIMINAR PAGO
	=============================================*/

	static public function mdlEliminarPago($tabla, $datos){

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
	SUMAR EL TOTAL DE PAGOS
	=============================================*/

	static public function mdlSumaTotalPagos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as neto FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
