@extends('layouts.admin')

@section('content')
<div  ng-app="categoriaModule">
    <div ng-controller="categoriaAdmonController">

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Administra Categoría </h2>   
                        </div>
                    </div>              
                    <!-- /. ROW  -->
                    <hr />

                    <form>
                    <div class="col-lg-12 col-md-12">
                    	<label>Categoría</label>
						<select class="form-control" ng-change="showAllSubCategoria(categoriap.id)" ng-model="categoriap" ng-options="categoriap as categoriap.nombre for categoriap in lcategoriap">
						  <option value="">------------</option>

						</select>
                    </div>
                    <div class="col-lg-12 col-md-12">
                    	<label>Sub Categoría</label>
						<select multiple  class="form-control" ng-model="subcategoria" ng-options="subcategoria as subcategoria.nombre for subcategoria in lsubcategoria">
						</select>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" />
                            <p class="help-block">Nombre de la Categoría.</p>
                        </div>
                    </div>


                                        <div class="col-lg-6 col-md-6">

                        <a href="#" class="btn btn-danger">Eliminar</a>
                        <a href="#" class="btn btn-success">Agregar</a>
                        <a href="#" class="btn btn-info">Actualizar</a>


                    </div>
                    </form>
                    <!-- /. ROW  --> 
    </div>
</div>
{!!Html::script('app/lib/angular/angular.min.js')!!}
{!!Html::script('app/controller/categoria.js')!!}

@stop