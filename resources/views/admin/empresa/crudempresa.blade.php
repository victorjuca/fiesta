@extends('layouts.admin')

@section('content')


                    <div class="row">
                        <div class="col-md-12">
                            <h2>Administra Empresa </h2>   
                        </div>
                    </div>              
                    <!-- /. ROW  -->
                    <hr />
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="imagen">Imagen</label>
  <div class="col-md-4">
    <input id="imagen" name="imagen" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="Escribe el nombre" class="form-control input-md">
  <span class="help-block">Nombre de la Empresa</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripción</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="estado">Estado</label>
  <div class="col-md-4">
    <select id="estado" name="estado" class="form-control">
      <option value="1">Guanajuato</option>
      <option value="2">Queretaro</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="municipio">Municipio</label>
  <div class="col-md-4">
    <select id="municipio" name="municipio" class="form-control">
      <option value="1">Dolores Hidalgo</option>
      <option value="2">San Diego de la Union</option>
    </select>
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="activa">Activa</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="activa-0">
      <input type="checkbox" name="activa" id="activa-0" value="1">
      Define si esta activa
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefono2">Telefono 2</label>  
  <div class="col-md-4">
  <input id="telefono2" name="telefono2" type="text" placeholder="Telefono 2" class="form-control input-md">
  <span class="help-block">Escribe tu Teléfono 2</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefono1">Telefono 1</label>  
  <div class="col-md-4">
  <input id="telefono1" name="telefono1" type="text" placeholder="Telefono" class="form-control input-md">
  <span class="help-block">Escribe tu Telefono</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="correo">Correo Electrónico </label>  
  <div class="col-md-4">
  <input id="correo" name="correo" type="text" placeholder="Correo Electrónico" class="form-control input-md">
  <span class="help-block">Escribe tu correo Electrónico</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="direccion">Dirección</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="direccion" name="direccion">Escribe tu Dirección</textarea>
  </div>
</div>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="paginaweb">Pagina Web</label>
  <div class="col-md-4">
    <input id="paginaweb" name="paginaweb" type="search" placeholder="Pagina Web" class="form-control input-md">
    <p class="help-block">Escribe le URL de tu Pagina Web</p>
  </div>
</div>

</fieldset>
</form>
                    <!-- /. ROW  --> 

@stop