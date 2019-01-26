<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Impuestos Pagados

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar impuestos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarImpuesto">

          Agregar impuesto

        </button>


      </div>

      <div class="box-body">

       <table class="table table-bordered table-hover dt-responsive" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>RFC</th>
           <th>Tipo Declaracion</th>
           <th>Perioricidad</th>
           <th>Mes</th>
           <th>No Operacion</th>
           <th>Ejercicio</th>
           <th>Concepto de Pago</th>
           <th>Impuesto a cargo</th>
           <th>Recargos</th>
           <th>Compensaciones</th>
           <th>Cantidad a Cargo</th>
           <th>Cantidad a Pagar</th>

         </tr>

        </thead>

        <tbody>

        <?php


          $item = null;
          $valor = null;

          $impuestos = ControladorImpuestos::ctrMostrarImpuestos($item, $valor);

          foreach ($impuestos as $key => $value) {


            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["rfc"].'</td>

                    <td>'.$value["declaracion"].'</td>

                    <td>'.$value["periodo"].'</td>

                    <td>'.$value["mes"].'</td>

                    <td>'.$value["operacion"].'</td>

                    <td>'.$value["ejercicio"].'</td>

                    <td>'.$value["concepto"].'</td>

                    <td>$'.number_format($value["Impcargo"],2).'</td>

                    <td>$'.number_format($value["recargo"],2).'</td>

                    <td>$'.number_format($value["compensacion"],2).'</td>

                    <td>$'.number_format($value["cargo"],2).'</td>

                    <td>$'.number_format($value["pago"],2).'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarImpuesto" idImpuesto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarImpuesto"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarImpuesto" idImpuesto="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>

                    </td>

                  </tr>';

            }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR IMPUESTO
======================================-->

<div id="modalAgregarImpuesto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar impuesto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL RFC -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRfc" placeholder="Ingresar RFC" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE DECLARACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDeclaracion" placeholder="Ingresar tipo de declaracion" required>

              </div>

            </div>

            <!-- ENTRADA PARA PERIORICIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPeriodo" placeholder="Ingresar perioricidad" required>

              </div>

            </div>

            <!-- ENTRADA PARA MES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="date" class="form-control input-lg" name="nuevoMes" placeholder="Ingresar mes" required>

              </div>

            </div>

            <!-- ENTRADA PARA No OPERACION-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevaOperacion" placeholder="Ingresar # operacion" required>

              </div>

            </div>

             <!-- ENTRADA PARA EJERCICIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoEjercicio" placeholder="Ingresar ejercicio" required>

              </div>

            </div>

            <!-- ENTRADA PARA CONCEPTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoConcepto" placeholder="Ingresar concepto" required>

              </div>

            </div>

            <!-- ENTRADA PARA IMPUESTO A CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoImpcargo" placeholder="Ingresar impuesto a cargo" required>

              </div>

            </div>

            <!-- ENTRADA PARA RECARGOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoRecargo" placeholder="Ingresar recargos" required>

              </div>

            </div>

            <!-- ENTRADA PARA COMPENSACIONES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoCompensacion" placeholder="Ingresar compensacion" required>

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD A CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoCargo" placeholder="Ingresar cantidad a cargo" required>

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD A PAGAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoPago" placeholder="Ingresar cantidad a pagar" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Impuesto</button>

        </div>

      </form>

      <?php

        $crearImpuesto = new ControladorImpuestos();
        $crearImpuesto -> ctrCrearImpuesto();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR IMPUESTO
======================================-->

<div id="modalEditarImpuesto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar impuesto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL RFC -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarImpuesto" id="editarImpuesto" value="" required>
                <input type="hidden" id="idImpuesto" name="idImpuesto">
              </div>

            </div>

            <!-- ENTRADA PARA TIPO DECLARACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="editarDeclaracion" id="editarDeclaracion" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA PERIORICIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="editarPeriodo" id="editarPeriodo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL MES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="date" class="form-control input-lg" name="editarMes" id="editarMes" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA No OPERACION-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="editarOperacion" id="editarOperacion" value="" required>

              </div>

            </div>

             <!-- ENTRADA PARA EJERCICIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarEjercicio" id="editarEjercicio" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA CONCEPTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarConcepto" id="editarConcepto" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA IMPUESTO A CARGO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarImpcargo" id="editarImpcargo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA RECARGOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarRecargo" id="editarRecargo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA COMPENSACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarCompensacion" id="editarCompensacion" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD A CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarCargo" id="editarCargo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD A PAGAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="editarPago" id="editarPago" value="" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarImpuesto = new ControladorImpuestos();
        $editarImpuesto -> ctrEditarImpuesto();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarImpuesto = new ControladorImpuestos();
  $eliminarImpuesto -> ctrEliminarImpuesto();

?>
