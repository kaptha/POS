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
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
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

                <input type="text" min="0" class="form-control input-lg" name="nuevoDeclaracion" placeholder="Ingresar tipo de declaracion" required>

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

                <input type="text" class="form-control input-lg" name="nuevoMes" placeholder="Ingresar mes" required>

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

          <button type="submit" class="btn btn-primary">Guardar impuesto</button>

        </div>

      </form>

    </div>

  </div>

</div>


