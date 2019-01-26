<?php

$item = null;
$valor = null;

//$egresos = ControladorEgresos::ctrMostrarEgresos($item, $valor);
$egresos=ControladorPlantilla::ctrRangoFechas("egresos",$fechaInicial,$fechaFinal);
$arrayFacturas = array();
$arraylistaUsos = array();

foreach ($egresos as $key => $valueEgresos) {

        #Capturamos los usos en un array
        array_push($arrayFacturas, $valueEgresos["uso"]);

        #Capturamos las usos y los impuestos en un mismo array
        $arraylistaUsos = array($valueEgresos["uso"] => $valueTras["trasladado"]);

        foreach ($arraylistaUsos as $key => $value) {

            $sumaTotalUsos[$key] += $value;

         }
}
#Evitamos repetir uso
$noRepetirUso = array_unique($arrayFacturas);

?>
<!--=====================================
USO DE FACTURAS DE LOS EGRESOS
======================================-->

<div class="box box-success">

	<div class="box-header with-border">

    	<h3 class="box-title">Usos de facturas</h3>

  	</div>

  	<div class="box-body">

		<div class="chart-responsive">

			<div class="chart" id="bar-chart" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>

//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart',
  resize: true,
  data: [

  <?php

    foreach($noRepetirUso as $value){

      echo "{y: '".$value."', a: '".$sumaTotalUsos[$value]."'},";

    }

  ?>
  ],
  barColors: ['#0af'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['usos'],
  preUnits: '$',
  hideHover: 'auto'
});

</script>
