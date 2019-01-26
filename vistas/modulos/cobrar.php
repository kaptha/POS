<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Cuentas por cobrar

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Cuentas por cobrar</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCobro">

          Agregar cuenta

        </button>


      </div>

      <div class="box-body">

       <table class="table table-bordered table-hover dt-responsive" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>RFC Receptor</th>
           <th>Fecha</th>
           <th>Lugar Expedicion</th>
           <th>Tipo CFDI</th>
           <th>Metodo de Pago</th>
           <th>Forma de Pago</th>
           <th>Impuesto Trasladado</th>
           <th>Subtotal</th>
           <th>Total</th>

         </tr>

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cobros = ControladorCobros::ctrMostrarCobros($item, $valor);

          foreach ($cobros as $key => $value) {


            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["receptor"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>'.$value["lugar"].'</td>

                    <td>'.$value["tipo"].'</td>

                    <td>'.$value["metodo"].'</td>

                    <td>'.$value["forma"].'</td>

                    <td>$'.number_format($value["trasladado"],2).'</td>

                    <td>$'.number_format($value["subtotal"],2).'</td>

                    <td>$'.number_format($value["total"],2).'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCobro" data-toggle="modal" data-target="#modalEditarCobro" idCobro="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCobro" idCobro="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR COBRO
======================================-->

<div id="modalAgregarCobro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cuenta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL RFC RECEPTOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCobro" placeholder="Ingresar RFC Receptor" required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="date" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar Fecha Emision" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LUGAR EXPEDICION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoCP" placeholder="Ingresar CP Emision" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO de CFDI -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <select class="form-control input-lg" name="nuevoTipo">

                  <option value="">Selecionar Tipo CFDI</option>

                  <option value="ingreso">Ingreso</option>

                  <option value="egreso">Egreso</option>

                  <option value="traslado">Traslado</option>

                  <option value="nomina">Nomina</option>

                  <option value="pago">Pago</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA METODO DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <select class="form-control input-lg" name="nuevoMetodo">

                  <option value="">Selecionar Metodo Pago</option>

                  <option value="una exhibicion">PUE</option>

                  <option value="parcialidades">PPD</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR FORMA DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>

                <select class="form-control input-lg" name="nuevoFpago">

                  <option value="">Selecionar Forma Pago</option>

                  <option value="1">Efectivo</option>

                  <option value="2">Cheque nominativo</option>

                  <option value="3">Transferencia electrónica</option>

                  <option value="4">Tarjeta de crédito</option>

                  <option value="5">Monedero electrónico</option>

                  <option value="6">Dinero electrónico</option>

                  <option value="8">Vales de despensa</option>

                  <option value="12">Dación en pago</option>

                  <option value="13">Dación en pago</option>

                  <option value="14">Pago por consignación</option>

                  <option value="15">Condonación</option>

                  <option value="17">Compensación</option>

                  <option value="23">Novación</option>

                  <option value="24">Confusión</option>

                  <option value="25">Remisión de deuda</option>

                  <option value="26">Prescripción o caducidad</option>

                  <option value="27">A satisfacción del acreedor</option>

                  <option value="28">A satisfacción del acreedor</option>

                  <option value="29">Tarjeta de servicios</option>

                  <option value="30">Aplicación de anticipos</option>

                  <option value="31">Intermediario pagos</option>

                  <option value="99">Por definir</option>

                </select>

              </div>

            </div>



            <!-- ENTRADA PARA IMPUESTO TRASLADADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calculator"></i></span>

                <input type="number" step="any" class="form-control input-lg" name="nuevoItrasladado" placeholder="Impuesto trasladado" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBTOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa  fa-calculator"></i></span>

                <input type="number" step="any" class="form-control input-lg" name="nuevoSub" placeholder="subtotal" required>

              </div>

            </div>

            <!-- ENTRADA PARA TOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                <input type="number" step="any" class="form-control input-lg" name="nuevoTotal" placeholder="Total" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cuenta</button>

        </div>

      </form>

      <?php

        $crearCobro = new ControladorCobros();
        $crearCobro -> ctrCrearCobro();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR COBRO
======================================-->

<div id="modalEditarCobro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cuenta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL RFC RECEPTOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarCobro" name="editarCobro"  required>
                 <input type="hidden" id="idCobro" name="idCobro">
              </div>

            </div>

            <!-- ENTRADA PARA FECHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

                <input type="date" class="form-control input-lg" id="editarFecha" name="editarFecha" required>

              </div>

            </div>

            <!-- ENTRADA PARA CP EMISION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" id="editarCodigop" name="editarCodigop" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO de CFDI -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <select class="form-control input-lg" name="editarTipo">

                  <option value="" id="editarTipo">Selecionar Tipo CFDI</option>

                  <option value="ingreso">Ingreso</option>

                  <option value="egreso">Egreso</option>

                  <option value="traslado">Traslado</option>

                  <option value="nomina">Nomina</option>

                  <option value="pago">Pago</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR METODO DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <select class="form-control input-lg" name="editarMetodo">

                  <option value="" id="editarMetodo">Selecionar Metodo Pago</option>

                  <option value="una_exhibicion">PUE</option>

                  <option value="Parcialidades">PPD</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR FORMA DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>

                <select class="form-control input-lg" name="editarFpago">

                  <option value="" id="editarFpago">Selecionar Forma Pago</option>

                  <option value="1">Efectivo</option>

                  <option value="2">Cheque nominativo</option>

                  <option value="3">Transferencia electrónica</option>

                  <option value="4">Tarjeta de crédito</option>

                  <option value="5">Monedero electrónico</option>

                  <option value="6">Dinero electrónico</option>

                  <option value="8">Vales de despensa</option>

                  <option value="12">Dación en pago</option>

                  <option value="13">Dación en pago</option>

                  <option value="14">Pago por consignación</option>

                  <option value="15">Condonación</option>

                  <option value="17">Compensación</option>

                  <option value="23">Novación</option>

                  <option value="24">Confusión</option>

                  <option value="25">Remisión de deuda</option>

                  <option value="26">Prescripción o caducidad</option>

                  <option value="27">A satisfacción del acreedor</option>

                  <option value="28">A satisfacción del acreedor</option>

                  <option value="29">Tarjeta de servicios</option>

                  <option value="30">Aplicación de anticipos</option>

                  <option value="31">Intermediario pagos</option>

                  <option value="99">Por definir</option>

                </select>

              </div>

            </div>



            <!-- ENTRADA PARA IMPUESTO TRASLADADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calculator"></i></span>

                <input type="number" step="any" class="form-control input-lg" id="editarItrasladado" name="editarItrasladado" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBTOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calculator"></i></span>

                <input type="number" step="any" class="form-control input-lg" id="editarSub" name="editarSub" required>

              </div>

            </div>

            <!-- ENTRADA PARA TOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                <input type="number" step="any" class="form-control input-lg" id="editarTotal" name="editarTotal" required>

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

        $editarCobro = new ControladorCobros();
        $editarCobro -> ctrEditarCobro();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarCobro = new ControladorCobros();
  $eliminarCobro -> ctrEliminarCobro();

?>
