<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Nominas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar nominas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarNomina">

          Agregar empleado

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>RFC</th>
           <th>Email</th>
           <th>Tipo Contrato</th>
           <th>Regimen</th>
           <th>Fecha Inicio</th>
           <th>Perioricidad Pago</th>
           <th>Clave del Estado</th>
           <th>Telefono</th>
           <th>Sueldo Base</th>
           <th>ISR</th>
           <th>IMSS</th>
           <th>Otros</th>
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
MODAL AGREGAR EMPLEADO
======================================-->

<div id="modalAgregarNomina" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmpleado" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA RFC -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRfcempleado" placeholder="RFC empleado" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

          <!-- ENTRADA PARA TIPO CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContrato" placeholder="Tipo de contrato" required>

              </div>

            </div>

            <!-- ENTRADA PARA REGIMEN-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRegimen" placeholder="Tipo de regimen" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->

           <div class="form-group">

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

               <input type="text" class="form-control input-lg" name="nuevaFechainicio" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

             </div>

           </div>

           <!-- ENTRADA PARA PERIORICIDAD -->

           <div class="form-group">

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>

               <input type="text" class="form-control input-lg" name="nuevoPeriodo" placeholder="Periodo de Pago" required>

             </div>

           </div>

          <!-- ENTRADA PARA CLAVE ENTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClave" placeholder="Clave entidad federativa" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoTelefono"  data-inputmask="'mask':'(999) 999-9999'" data-mask value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUELDO  -->

           <div class="form-group">

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

               <input type="number" step="any" class="form-control input-lg" name="nuevoSueldo" placeholder="Ingresar sueldo base" required>

             </div>

           </div>

            <!-- ENTRADA PARA ISR  -->

           <div class="form-group">

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

               <input type="number" step="any" class="form-control input-lg" name="nuevoIsr" placeholder="Ingresar ISR" required>

             </div>

           </div>

           <!-- ENTRADA PARA IMSS  -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

              <input type="number" step="any" class="form-control input-lg" name="nuevoImss" placeholder="Ingresar IMSS" required>

            </div>

          </div>

          <!-- ENTRADA PARA OTRAS DEDUCCIONES  -->

         <div class="form-group">

           <div class="input-group">

             <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

             <input type="number" step="any" class="form-control input-lg" name="nuevoOtro" placeholder="Otras Deducciones" required>

           </div>

         </div>

         <!-- ENTRADA PARA TOTAL  -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

            <input type="number" step="any" class="form-control input-lg" name="nuevoTotal" placeholder="Total Sueldo" required>

          </div>

        </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar empleado</button>

        </div>

      </form>

    </div>

  </div>

</div>
