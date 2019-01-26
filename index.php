<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/egresos.controlador.php";
require_once "controladores/ingresos.controlador.php";
require_once "controladores/nominas.controlador.php";
require_once "controladores/impuestos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/cobrar.controlador.php";
require_once "controladores/pagar.controlador.php";
require_once "controladores/depreciacion.controlador.php";

require_once "modelos/plantilla.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/egresos.modelo.php";
require_once "modelos/ingresos.modelo.php";
require_once "modelos/nominas.modelo.php";
require_once "modelos/impuestos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/cobrar.modelo.php";
require_once "modelos/pagar.modelo.php";
require_once "modelos/depreciacion.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
