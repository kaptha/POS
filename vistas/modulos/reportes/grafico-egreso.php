<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

//$respuesta = ControladorEgresos::ctrMostrarEgresos($fechaInicial, $fechaFinal);
$respuesta=ControladorPlantilla::ctrRangoFechas("egresos",$fechaInicial,$fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

  #Capturamos sólo el año y el mes
	$fecha = substr($value["fecha"],0,10);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["subtotal"]);

	#Sumamos los ingresos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {

		$sumaPagosMes[$key] += $value;
	}

}


$noRepetirFechas = array_unique($arrayFechas);


?>
<!--=====================================
GRÁFICO DE EGRESOS
======================================-->
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Egresos</h3>


            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart1" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
  </div>
  <script>
  // LINE CHART
  var line = new Morris.Line({
    element: 'line-chart1',
    resize: true,
    data: [
      <?php

      if($noRepetirFechas != null){

        foreach($noRepetirFechas as $key){

          echo "{ y: '".$key."', egresos: ".$sumaPagosMes[$key]." },";

       }

          echo "{y: '".$key."', egresos: ".$sumaPagosMes[$key]." }";

       }else{

         echo "{ y: '0', egresos: '0'}";

       }

    ?>
    ],
    xkey: 'y',
    ykeys: ['egresos'],
    labels: ['egresos'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'

  });
  </script>
