var app = angular.module('categoriaModule', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
 
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
app.controller('categoriaAdmonController', ['$scope', '$http', function ($scope, $http) {
        showAllPrincipal($scope, $http);

        console.log(token);

        var opc;


        $scope.lanzamodal = function (opcx, cat) {
            $('#modalCrud').modal('show');
            opc = opcx;
            $scope.categoria = cat;    
        };


        $scope.crudCategoria = function () {

            if (!valida($scope)) {
                return;
            }
            var token = document.getElementById("token").value;

            var file = $scope.imagen;
            var fd = new FormData();
            fd.append('file', file);
            $scope.categoria.imagen = fd;
            if (opc === 1) {
                $scope.categoria.categoria_id = 1;

                $http({
                    method: 'post',
                    url: '/categoria',
                    data: {myObj: $scope.categoria},
                    file: file,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.getElementById("token").value
                    }
                }).success(function (response) {

					if(response.estado === 0){
 						alertify.success(response.mensaje);	
 						showAllPrincipal($scope, $http);
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
 						showAllPrincipal($scope, $http);
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


$scope.eliminaCategoria = function(categoria_id) {

		alertify.confirm("¿Deseas eliminar la categoria?", function(e) {
			if (e) {
				$http({
					method: 'DELETE',
					url: '/categoria/' + categoria_id,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
						'X-CSRF-TOKEN': document.getElementById("token").value
					}
				}).success(function(response) {

					console.log(response);
					if(response.estado === 0){
 						alertify.success(response.mensaje);	
 						showAllPrincipal($scope, $http);
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