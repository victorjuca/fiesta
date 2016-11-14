var app = angular.module('categoriaModule', []);
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
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

            if (opc === 1) {
                $scope.categoria.categoria_id = 1;

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