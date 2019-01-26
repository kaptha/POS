<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Cuentas por pagar

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Cuentas por pagar</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPago">

          Agregar cuenta

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>RFC Emisor</th>
           <th>Fecha</th>
           <th>Lugar Expedicion</th>
           <th>Metodo de Pago</th>
           <th>Forma de Pago</th>
           <th>Uso CFDI</th>
           <th>Impuesto Trasladado</th>
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
MODAL AGREGAR PAGO
======================================-->

<div id="modalAgregarPago" class="modal fade" role="dialog">

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

            <!-- ENTRADA PARA EL RFC EMISOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPago" placeholder="Ingresar RFC Emisor" required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" min="0" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar Fecha Emision" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LUGAR EXPEDICION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoCP" placeholder="Ingresar CP Emision" required>

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

             <!-- ENTRADA PARA SELECCIONAR USO CFDI -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoUso">

                  <option value="">Selecionar Uso CFDI</option>

                  <option value="G01">Adquisición de mercancias</option>

                  <option value="G02">Devoluciones, descuentos o bonificaciones</option>

                  <option value="G03">Gastos en general</option>

                  <option value="I01">Construcciones</option>

                  <option value="I02">Mobilario y equipo de oficina</option>

                  <option value="I03">Equipo de transporte</option>

                  <option value="I04">Equipo de computo</option>

                  <option value="I05">Dados, troqueles, moldes, matrices</option>

                  <option value="I06">Comunicaciones telefónicas</option>

                  <option value="I07">Comunicaciones satelitales</option>

                  <option value="I08">Otra maquinaria y equipo</option>

                  <option value="D01">Honorarios médicos y gastos hospitalarios</option>

                  <option value="D02">Gastos médicos por incapacidad o discapacidad</option>

                  <option value="D03">Gastos funerales</option>

                  <option value="D04">Donativos</option>

                  <option value="D05">Intereses reales efectivamente pagados por créditos hipotecarios</option>

                  <option value="D06">Aportaciones voluntarias al SAR</option>

                  <option value="D07">Primas por seguros de gastos médicos</option>

                  <option value="D08">Gastos de transportación escolar obligatoria</option>

                  <option value="D09">Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones</option>

                  <option value="D10">Pagos por servicios educativos (colegiaturas)</option>

                  <option value="P01">Por definir</option>


                </select>

              </div>

            </div>

            <!-- ENTRADA PARA IMPUESTO TRASLADADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoItrasladado" placeholder="Impuesto trasladado" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBTOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoSub" placeholder="subtotal" required>

              </div>

            </div>

            <!-- ENTRADA PARA TOTAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoTotal" placeholder="Total" required>

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
