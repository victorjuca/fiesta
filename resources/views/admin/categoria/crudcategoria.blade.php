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

        <div class="col-md-12">    
            <button type="button" class="btn btn-success btn-block" ng-click='lanzamodal(1, null)'>Guardar</button>
        </div>     
        <hr />

        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr ng-repeat="categoriap in lcategoriap">

                    <td>%%categoriap.nombre%%</td>
                    <td><button type="button" class="btn btn-primary btn-sm" ng-click = 'lanzamodal(2,categoriap)'>Actualizar</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm" ng-click = 'eliminaCategoria(categoriap.id)'>Eliminar</button></td>

                    <td><img ng-click='lanzamodalimagen(categoriap.id)' src="/storage/%%categoriap.imagen%%" alt="Chania" width="313" height="163"></td>

                </tr>
            </table>
        </div>   

@include('admin.categoria.modal_categoria')        
@include('admin.categoria.modal_imagen_categoria')    
        <!-- /. ROW  --> 
    </div>
</div>



{!!Html::script('app/lib/angular/angular.min.js')!!}
{!!Html::script('app/controller/categoria.js')!!}

@stop