@extends('layouts.admin')

@section('content')
<div  ng-app="categoriaModule">
    <div ng-controller="categoriaAdmonController">

        <div class="row">
            <div class="col-md-12">
                <h2>Administra Sub Categoría </h2>   
            </div>
        </div>              
        <!-- /. ROW  -->
        <hr />
        <div class="col-md-12">    
            <button type="button" class="btn btn-success btn-block" ng-click='lanzamodal(1,categoriap.id)' ng-show='show'>Guardar</button>
        </div>             
                    <div class="col-lg-12 col-md-12">
                        <label>Categoría</label>
                        <select class="form-control" ng-change="showAllSubCategoria(categoriap.id)" ng-model="categoriap" ng-options="categoriap as categoriap.nombre for categoriap in lcategoriap" ng-change="showAllSubCategoria(categoriap.id)">
                          <option value="">------------</option>

                        </select>
                    </div>

        <hr />

        <div class="col-md-12">
            <table class="table">
     
                <tr ng-repeat="subcategoria in lsubcategoria">

                    <td>%%subcategoria.nombre%%</td>
                    <td><button type="button" class="btn btn-primary btn-sm" ng-click = 'lanzamodalupdate(2,subcategoria)'>Actualizar</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm" ng-click = 'eliminaCategoria(subcategoria)'>Eliminar</button></td>
                </tr>
            </table>
        </div>   

@include('admin.categoria.modal_sub_categoria')        
        <!-- /. ROW  --> 
    </div>
</div>



{!!Html::script('app/lib/angular/angular.min.js')!!}
{!!Html::script('app/controller/sub_categoria.js')!!}

@stop