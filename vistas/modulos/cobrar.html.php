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

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>RFC Receptor</th>
           <th>CP Emision/Fecha</th>
           <th>Regimen Fiscal</th>
           <th>Tipo Comprobante</th>
           <th>Regimen Fiscal</th>
           <th>Metodo Pago</th>
           <th>Forma de Pago</th>
           <th>Impuestos</th>
           <th>Subtotal</th>
           <th>Total</th>

         </tr>

        </thead>

        <tbody>

          <tr>



            <td>

              <div class="btn-group">

                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>

            </td>

          </tr>


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

            <!-- ENTRADA PARA RFC RECEPTOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRFC" placeholder="RFC Receptor" required>

              </div>

            </div>

            <!-- ENTRADA PARA CP / FECHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="nuevoCPF" placeholder="Fecha y codigo postal" required>

              </div>

            </div>

            <!-- ENTRADA PARA REGIMEN FISCAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRegimen" placeholder="Regimen Fiscal" required>

              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE COMPROBANTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoComprobante" required>

              </div>

            </div>



            <!-- ENTRADA PARA REGIMEN-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRegimen" placeholder="Tipo de regimen" required>

              </div>

            </div>

            <!-- ENTRADA PARA METODO DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoMetodo">

                  <option value="">Selecionar Metodo Pago</option>

                  <option value="una_exhibicion">PUE</option>

                  <option value="Parcialidades">PPD</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR FORMA DE PAGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

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

            <!-- ENTRADA PARA IMPUESTOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoImp" placeholder="Impuesto" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBTOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoSubtotal" placeholder="Subtotal" required>

              </div>

            </div>

             <!-- ENTRADA PARA TOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="number" class="form-control input-lg" name="nuevTotal" placeholder="total" required>

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

    </div>

  </div>

</div>
