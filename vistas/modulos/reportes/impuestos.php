<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

//$respuesta = ControladorImpuestos::ctrMostrarImpuestos($fechaInicial, $fechaFinal);
$respuesta=ControladorPlantilla::ctrRangoFechas("impuestos",$fechaInicial,$fechaFinal);
$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos sólo el año y el mes
	$fecha = substr($value["mes"],0,7);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["pago"]);

	#Sumamos los ingresos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {

		$sumaPagosMes[$key] += $value;
	}

}


$noRepetirFechas = array_unique($arrayFechas);


?>
<!--=====================================
GRÁFICO DE IMPUESTOS
======================================-->
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Impuestos Pagados</h3>


            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
  </div>
  <script>
  // LINE CHART
  var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
    data: [
      <?php

       if($noRepetirFechas != null){

         foreach($noRepetirFechas as $key){

           echo "{ y: '".$key."', impuestos: ".$sumaPagosMes[$key]." },";

        }

           echo "{y: '".$key."', impuestos: ".$sumaPagosMes[$key]." }";

        }else{

          echo "{ y: '0', impuestos: '0' }";

        }

    ?>
    ],
    xkey: 'y',
    ykeys: ['impuestos'],
    labels: ['impuestos'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'

  });
  </script>
