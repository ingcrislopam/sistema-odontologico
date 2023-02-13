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
                          <h1 class="box-title">Tratamiento <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Ficha medica</th>
                                <th>Fecha</th>
                                <th>Diagnosticos y complicaciones</th>
                                <th>Procedimientos</th>
                                <th>Prescripciones</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Ficha medica</th>
                                <th>Fecha</th>
                                <th>Diagnosticos y complicaciones</th>
                                <th>Procedimientos</th>
                                <th>Prescripciones</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ficha medica:</label>
                            <input type="hidden" class="form-control" name="id_tratamiento" id="id_tratamiento">
                            <select name="id_ficha_medica" id="id_ficha_medica" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Odontograma</label>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Superior</label>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 18</label>
                            <select name="d18" id="d18" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 17</label>
                            <select name="d17" id="d17" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 16</label>
                            <select name="d16" id="d16" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 15</label>
                            <select name="d15" id="d15" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 14</label>
                            <select name="d14" id="d14" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 13</label>
                            <select name="d13" id="d13" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 12</label>
                            <select name="d12" id="d12" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 11</label>
                            <select name="d11" id="d11" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 21</label>
                            <select name="d21" id="d21" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 22</label>
                            <select name="d22" id="d22" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 23</label>
                            <select name="d23" id="d23" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 24</label>
                            <select name="d24" id="d24" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 25</label>
                            <select name="d25" id="d25" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 26</label>
                            <select name="d26" id="d26" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 27</label>
                            <select name="d27" id="d27" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 28</label>
                            <select name="d28" id="d28" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Inferior</label>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 48</label>
                            <select name="d48" id="d48" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 47</label>
                            <select name="d47" id="d47" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 46</label>
                            <select name="d46" id="d46" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 45</label>
                            <select name="d45" id="d45" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 44</label>
                            <select name="d44" id="d44" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 43</label>
                            <select name="d43" id="d43" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 42</label>
                            <select name="d42" id="d42" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 41</label>
                            <select name="d41" id="d41" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 31</label>
                            <select name="d31" id="d31" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 32</label>
                            <select name="d32" id="d32" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 33</label>
                            <select name="d33" id="d33" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 34</label>
                            <select name="d34" id="d34" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label><i class="fa-solid fa-tooth"></i> 35</label>
                            <select name="d35" id="d35" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 36</label>
                            <select name="d36" id="d36" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 37</label>
                            <select name="d37" id="d37" class="form-control selectpicker" data-live-search="true" required></select>
                            <label><i class="fa-solid fa-tooth"></i> 38</label>
                            <select name="d38" id="d38" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Diagnosticos y complicaciones:</label>
                            <input type="text" class="form-control" name="diagnosticos_complicaciones" id="diagnosticos_complicaciones" maxLength="100" placeholder="Diagnosticos y complicaciones" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Procedimientos:</label>
                            <input type="text" class="form-control" name="procedimientos" id="procedimientos" maxLength="100" placeholder="Procedimientos" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Prescripciones:</label>
                            <input type="text" class="form-control" name="prescripciones" id="prescripciones" maxLength="100" placeholder="Prescripciones" required>
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
<script type="text/javascript" src="scripts/tratamiento.js"></script>
<?php
}
ob_end_flush();
?>