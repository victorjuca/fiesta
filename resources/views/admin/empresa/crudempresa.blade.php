@extends('layouts.admin')

@section('content')
{!!Html::style('admin/assets/cropbox-master/css/style.css')!!}
<div  ng-app="empresaModule">
    <div ng-controller="empresaAdmonController">
    <style>

        .action
        {
            width: 400px;
            height: 30px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
        }
    </style>
        <div class="row">
            <div class="col-md-12">
                <h2>Administra Empresa </h2>   
            </div>
        </div>              
        <!-- /. ROW  -->
        <hr />
        <form class="form-horizontal">
            <fieldset>
 <button type="button" class="btn btn-success" ng-click="guardaEmpresa()">Success</button>
                <!-- Form Name -->
                <legend>Form Name</legend>

                <!-- File Button --> 
                <div class="form-group">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success" ng-click="lanzamodal()">Carga Imagen</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                    <img id="imagen_principal" file-model="imagen_principal"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Nombre</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="textinput" type="text" ng-model="empresa.nombre" placeholder="Escribe el nombre" class="form-control input-md">
                        <span class="help-block">Nombre de la Empresa</span>  
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" ng-model="empresa.descripcion" for="descripcion">Descripción</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="descripcion" name="descripcion" ng-model="empresa.descripcion"  ></textarea>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="estado">Estado</label>
                    <div class="col-md-4">
                        <select id="estado" name="estado" class="form-control" ng-change="cargaMunicipio(estado.id)" ng-model="estado" ng-options="estado as estado.nombre for estado in lestado" >
<option value="">------------</option>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="municipio">Municipio</label>
                    <div class="col-md-4">
                        <select id="municipio" name="municipio" class="form-control"  ng-model="municipio" ng-options="municipio as municipio.nombre for municipio in lmunicipio" >
                            <option value="">------------</option>
                            
                        </select>
                    </div>
                </div>

                <!-- Multiple Checkboxes -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="activa">Activa</label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label for="activa-0">
                                <input type="checkbox" name="activa" ng-model="empresa.activa" id="activa-0" value="1">
                                Define si esta activa
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefono2" >Telefono 2</label>  
                    <div class="col-md-4">
                        <input id="telefono2" name="telefono2" type="text" placeholder="Telefono 2" ng-model="empresa.telefono2" class="form-control input-md">
                        <span class="help-block">Escribe tu Teléfono 2</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefono1" >Telefono 1</label>  
                    <div class="col-md-4">
                        <input id="telefono1" name="telefono1" type="text" placeholder="Telefono" ng-model="empresa.telefono1" class="form-control input-md">
                        <span class="help-block">Escribe tu Telefono</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="correo">Correo Electrónico </label>  
                    <div class="col-md-4">
                        <input id="correo" name="correo" type="text" placeholder="Correo Electrónico" ng-model="empresa.correo" class="form-control input-md">
                        <span class="help-block">Escribe tu correo Electrónico</span>  
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="direccion">Dirección</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="direccion" name="direccion" ng-model="empresa.direccion">Escribe tu Dirección</textarea>
                    </div>
                </div>

                <!-- Search input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="paginaweb" >Pagina Web</label>
                    <div class="col-md-4">
                        <input id="paginaweb" name="paginaweb" type="search" placeholder="Pagina Web" ng-model="empresa.pagian_web" class="form-control input-md">
                        <p class="help-block">Escribe le URL de tu Pagina Web</p>
                    </div>
                </div>
           
            </fieldset>
        </form>

        @include('admin.empresa.modal_subir_imagen')  
    </div>
</div>
<!-- /. ROW  --> 
{!!Html::script('app/lib/angular/angular.min.js')!!}
{!!Html::script('app/controller/empresa.js')!!}
{!!Html::script('admin/assets/cropbox-master/js/cropbox.js')!!} 
@stop