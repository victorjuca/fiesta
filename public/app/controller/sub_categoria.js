var app = angular.module('categoriaModule', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
app.controller('categoriaAdmonController', ['$scope', '$http', function ($scope, $http) {
        showAllPrincipal($scope, $http);

        $scope.show = false;
        var opc;
        var categoria_id;
        $scope.lanzamodal = function (opcx, categoria_idx) {
            $('#modalCrud').modal('show');
            opc = opcx;
            categoria_id = categoria_idx;
        };
        var categoria;

        $scope.lanzamodalupdate = function (opcx, cat) {
            $('#modalCrud').modal('show');
            opc = opcx;
             $scope.categoria = cat;
        };

        $scope.crudCategoria = function () {

            if (!valida($scope)) {
                return;
            }
            var token = document.getElementById("token").value;

            if (opc === 1) {
                $scope.categoria.categoria_id = categoria_id;

                $http({
                    method: 'post',
                    url: '/categoria',
                    data: $.param($scope.categoria),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.getElementById("token").value
                    }
                }).success(function (response) {

                    if(response.estado === 0){
                        alertify.success(response.mensaje); 
                        showAllSubCategoria($scope, $http, categoria_id);
                        $scope.categoria = null;
                        $('#modalCrud').modal('hide');
                    }else{
                          alertify.error(response.mensaje);
                    }


                }).error(function (response) {
                    mensaje = "Ocurrio un error al tratar de guardar.";
                     alertify.error(mensaje);
                });
            }else{
                $http({
                    method: 'put',
                    url: '/categoria/'+ $scope.categoria.id,
                    data: $.param($scope.categoria),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.getElementById("token").value
                    }
                }).success(function (response) {

                    console.log(response);

                    if(response.estado === 0){
                        alertify.success(response.mensaje); 
                        showAllSubCategoria($scope, $http, $scope.categoria.categoria_id);
                        $scope.categoria = null;
                        $('#modalCrud').modal('hide');
                    }else{
                          alertify.error(response.mensaje);
                    }
                }).error(function (response) {
                    mensaje = "Ocurrio un error al tratar de actualizar.";
                     alertify.error(mensaje);
                });             
            }


        };


        $scope.showAllSubCategoria = function (categoria_id) {

            $scope.show = true;

            $http({
                method: 'get',
                url: '/showAllSubCategoria/' + categoria_id,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).success(function (response) {
                $scope.lsubcategoria = response;
            }).error(function (response) {
                mensaje = 'Ocurrió un error al tratar de cargar las categorias.';
                alertify.error(mensaje);
            });
        }

$scope.eliminaCategoria = function(categoria) {

        alertify.confirm("¿Deseas eliminar la categoria?", function(e) {
            if (e) {
                $http({
                    method: 'DELETE',
                    url: '/categoria/' + categoria.id,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.getElementById("token").value
                    }
                }).success(function(response) {

                    console.log(response);
                    if(response.estado === 0){
                        alertify.success(response.mensaje); 
                        showAllSubCategoria($scope, $http,  categoria.categoria_id);
                        $scope.categoria = null;
                    }else{
                          alertify.error(response.mensaje);
                    }

                }).error(function(response) {
                    mensaje = 'Ocurrio un error al eliminar.';
                    alertify.error(mensaje);
                });
            }
        });

    };

    }]);

function showAllSubCategoria(scope, http, categoria_id){
            http({
                method: 'get',
                url: '/showAllSubCategoria/' + categoria_id,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).success(function (response) {
                scope.lsubcategoria = response;
            }).error(function (response) {
                mensaje = 'Ocurrió un error al tratar de cargar las categorias.';
                alertify.error(mensaje);
            });
           
}
function showAllPrincipal(scope, http) {
    http({
        method: 'get',
        url: '/showAllPrincipal',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).success(function (response) {
        scope.lcategoriap = response;
    }).error(function (response) {
        mensaje = 'Ocurrió un error al tratar de cargar las categorias';
        alertify.error(mensaje);
    });
}





function valida(scope) {

    var nombre = document.getElementById("nombre").value;

    if (!validaVacion(nombre)) {
        alertify.error('El nombde se encuentra vacio.');
        return false;
    }

    return true;
}

function validaVacion(valor) {
    if (valor == '' || typeof valor == "undefined") {
        return false;
    }
    return true;
}