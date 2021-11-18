<?php
require 'Header.php';
?>
      <div class="content-wrapper">
        

        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Cliente <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <div class="panel-body table-responsive"id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Rif</th>
                            <th>Razón Social</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Rif</th>
                            <th>Razón Social</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                            <label>Rif</label>
                            <input type="hidden" name="IdCliente" id="IdCliente">
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Rif" id="Rif" maxlength="45" placeholder="Rif" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Razón Social</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="RazonSocial" id="RazonSocial" maxlength="45" placeholder="Razón Social" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Dirección</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Direccion" id="Direccion" maxlength="45" placeholder="Dirección" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Teléfono</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Telefono" id="Telefono" maxlength="45" placeholder="Telefono" required>
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
<script type="text/javascript" src="../Scripts/cliente.js"></script>