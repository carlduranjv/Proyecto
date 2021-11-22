<?php
require 'Header.php';
?>
      <div class="content-wrapper">
        

        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuario <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <div class="panel-body table-responsive"id="listadoregistros">
                        <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Telefono</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Imagen</th>
                            <th>Condicion</th>
                            <th>Estado</th>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Telefono</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Imagen</th>
                            <th>Condicion</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                            <label>Nombre (*)</label>
                            <input type="hidden" name="IdUsuario" id="IdUsuario">
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Nombre" id="Nombre" maxlength="45" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Apellido (*)</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Apellido" id="Apellido" maxlength="45" placeholder="Apellido" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Correo (*)</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Correo" id="Correo" maxlength="45" placeholder="Correo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Cargo (*)</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Cargo" id="Cargo" maxlength="45" placeholder="Cargo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                               <label>Telefono</label>
                           <input type="text" onkeyup="mayus(this);" class="form-control" name="Telefono" id="Telefono" maxlength="45" placeholder="Telefono">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Login (*)</label>
                            <input type="text" onkeyup="mayus(this);" class="form-control" name="Login" id="Login" maxlength="45" placeholder="Login" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-ms-6 col-xs-12">
                             <label>Password (*)</label>
                           <input type="password" onkeyup="mayus(this);" class="form-control" name="Password" id="Password" maxlength="45" placeholder="Password" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-ms-12 col-xs-12"></div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos:</label>
                            <ul style="list-style: none;" id="Permisos" name ="Permisos">
                              
                            </ul>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="Imagen" id="Imagen">
                            <input type="hidden" name="ImagenActual" id="ImagenActual">
                            <img src="" width="150px" height="120px" name="ImagenMuestra" id="ImagenMuestra">
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
<script type="text/javascript" src="../Scripts/usuario.js"></script>