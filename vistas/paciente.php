<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION['nombres']))
{
  header("Location: login.html");
}
else
{
  require 'header.php';

  if ($_SESSION['consultorio']==1)
  {
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Paciente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Direccion</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Direccion</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 300px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cedula:</label>
                            <input type="hidden" class="form-control" name="id_paciente" id="id_paciente">
                            <input type="text" class="form-control" name="cedula" id="cedula" maxLength="10" placeholder="Cedula" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombres:</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" maxLength="50" placeholder="Nombres" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" maxLength="50" placeholder="Apellidos" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxLength="100" placeholder="Direccion" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Sexo:</label>
                            <select class="form-control selectpicker" data-live-search="true" name="sexo" id="sexo" required>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
  }
  else
  {
    require 'noacceso.php';
  }

  require 'footer.php';
?>
<script type="text/javascript" src="scripts/paciente.js"></script>
<?php
}
ob_end_flush();
?>