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

  if ($_SESSION['historial']==1)
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
                          <h1 class="box-title">Ficha medica <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Paciente</th>
                                <th>Fecha</th>
                                <th>Consulta</th>
                                <th>Enfermedad</th>
                                <th>Antecedentes</th>
                                <th>Signos vitales</th>
                                <th>Examen</th>
                                <th>Planes</th>
                                <th>Diagnostico</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Paciente</th>
                                <th>Fecha</th>
                                <th>Consulta</th>
                                <th>Enfermedad</th>
                                <th>Antecedentes</th>
                                <th>Signos vitales</th>
                                <th>Examen</th>
                                <th>Planes</th>
                                <th>Diagnostico</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Paciente:</label>
                            <input type="hidden" class="form-control" name="id_ficha_medica" id="id_ficha_medica">
                            <select name="id_paciente" id="id_paciente" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Motivo de consulta:</label>
                            <input type="text" class="form-control" name="motivo_consulta" id="motivo_consulta" maxLength="100" placeholder="Motivo de consulta" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Enfermedad o problema actual:</label>
                            <input type="text" class="form-control" name="enfermedad_problema_actual" id="enfermedad_problema_actual" maxLength="100" placeholder="Enfermedad o problema actual" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Antecedentes personales y familiares:</label>
                            <input type="text" class="form-control" name="antecedentes_personales_familiares" id="antecedentes_personales_familiares" maxLength="100" placeholder="Antecedentes personales y familiares" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Signos vitales:</label>
                            <input type="text" class="form-control" name="signos_vitales" id="signos_vitales" maxLength="100" placeholder="Signos vitales" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Examen del sistema estomatognatico:</label>
                            <input type="text" class="form-control" name="examen_sistema_estomatognatico" id="examen_sistema_estomatognatico" maxLength="100" placeholder="Examen del sistema estomatognatico" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Planes de diagnostico:</label>
                            <input type="text" class="form-control" name="planes_diagnostico" id="planes_diagnostico" maxLength="100" placeholder="Planes de diagnostico" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Diagnostico:</label>
                            <input type="text" class="form-control" name="diagnostico" id="diagnostico" maxLength="100" placeholder="Diagnostico" required>
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
<script type="text/javascript" src="scripts/ficha_medica.js"></script>
<?php
}
ob_end_flush();
?>