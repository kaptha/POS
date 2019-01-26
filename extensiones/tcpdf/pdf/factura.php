<?php

require_once "../../../controladores/ingresos.controlador.php";
require_once "../../../modelos/ingresos.modelo.php";



class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemIngreso = "id";
$valorIngreso = $this->id;

$respuestaIngreso = ControladorIngresos::ctrMostrarIngresos($itemIngreso, $valorIngreso);

$fecha = substr($respuestaIngreso["fecha"],0,-1);
$receptor = substr($respuestaIngreso["rfc"], true);
$lugar = substr($respuestaIngreso["lugar"]);
$tipo = substr($respuestaIngreso["tipo"]);
$metodo = substr($respuestaIngreso["metodo"]);
$forma = substr($respuestaIngreso["forma"]);
$trasladado = number_format($respuestaIngreso["trasladado"],2);
$subtotal = number_format($respuestaIngreso["subtotal"],2);
$total = number_format($respuestaIngreso["total"],2);



//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width:150px"><img src="images/logo-negro-bloque.png"></td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Av Leon 502

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

					<br>
					Teléfono: 477 225 1002

					<br>
					fussion@cirugiaplastica.com

				</div>

			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorIngreso</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>

		<tr>

			<td style="width:540px"><img src="images/back.jpg"></td>

		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 1px solid #666; background-color:white; width:390px">

				Emisor: $respuestaIngreso[rfc]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">

				Fecha: $fecha

			</td>

		</tr>

		<tr>

			<td style="border: 1px solid #666; background-color:white; width:540px">Receptor: $respuestaVendedor[rfc]</td>

		</tr>

		<tr>

		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Metodo de Pago</td>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Forma de Pago</td>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Tipo de Ingreso</td>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Trasladado</td>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Subtotal</td>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$metodo[metodo]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$forma[forma]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$tipo[tipo]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$trasladado[trasladado]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$subtotal[subtotal]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:90px; text-align:center">
				$total[total]
			</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');



// ---------------------------------------------------------




// ---------------------------------------------------------
//SALIDA DEL ARCHIVO

$pdf->Output('factura.pdf', 'D');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["id"];
$factura -> traerImpresionFactura();

?>
