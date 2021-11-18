<?php
require 'Header.php';
?>
      <div class="content-wrapper">
        

        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Unidad de Medida <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <div class="panel-body table-responsive"id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                            <label>Código</label>
                            <input type="hidden" name="IdUnidad" id="IdUnidad">
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="CodUnidad" id="CodUnidad" maxlength="45" placeholder="Codigo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Nombre</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="NombreUnidad" id="NombreUnidad"  maxlength="45" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-ms-12">
                            <button class="btn btn-primary" type="sumit" name="btnGuardar" id="btnGuardar"><i class="fa fa-save"></i>Guardar</button>
                            <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i>Cancelar</button>
                          </div>
                        </form>
                    </div>

                  </div>
              </div>
          </div>
      </section>

    </div>
                 <?php
require 'Footer.php';
?>
<script type="text/javascript" src="../Scripts/unidadmedida.js"></script>