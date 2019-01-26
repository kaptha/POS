<?php

require_once "../../controladores/egresos.controlador.php";
require_once "../../modelos/egresos.modelo.php";
require_once "../../controladores/impuestos.controlador.php";
require_once "../../modelos/impuestos.modelo.php";
require_once "../../controladores/ingresos.controlador.php";
require_once "../../modelos/ingresos.modelo.php";

$reporte = new ControladorIngresos();
$reporte -> ctrDescargarReporte();
