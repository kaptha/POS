<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

//$respuesta = ControladorIngresos::ctrMostrarIngresos($fechaInicial, $fechaFinal);
$respuesta=ControladorPlantilla::ctrRangoFechas("ingresos",$fechaInicial,$fechaFinal);
$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos sólo el año y el mes
	$fecha = substr($value["fecha"],0,10);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos los impuestos
	$arrayVentas = array($fecha => $value["trasladado"]);

	#Sumamos los ingresos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {

		$sumaPagosMes[$key] += $value;
	}

}


$noRepetirFechas = array_unique($arrayFechas);

?>
<div class="box box-success">

	<div class="box-header with-border">

    	<h3 class="box-title">Impuestos por ingresos</h3>

  	</div>

  	<div class="box-body">

		<div class="chart-responsive">

			<div class="chart" id="bar-chart1" style="height: 300px;"></div>

		</div>

  	</div>

</div>
<script>

var bar = new Morris.Bar({
      element: 'bar-chart1',
      resize: true,
      data: [
				<?php

				if($noRepetirFechas != null){

					foreach($noRepetirFechas as $key){

            echo "{y: '".$key."', a: '".$sumaPagosMes[$key]."'},";


				 }

						echo "{y: '".$key."', a: '".$sumaPagosMes[$key]."'},";

				 }else{

					 echo "{ y: '0', ingresos: '0' }";

				 }

      ?>
      ],
			barColors: ['#0af'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['ingresos'],
      preUnits: '$',
      hideHover: 'auto'
    });

</script>
