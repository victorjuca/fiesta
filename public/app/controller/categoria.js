var app = angular.module('categoriaModule', []);
app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('%%');
	$interpolateProvider.endSymbol('%%');
});
app.controller('categoriaAdmonController', ['$scope', '$http', function($scope, $http) {

	showAllPrincipal($scope, $http);
	$scope.guardaCategoria = function() {
		if (!valida($scope)) {
			return;
		}

			$http({
				method: 'post',
				url: '/categoria',
				data: $.param($scope.evento),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
					'X-CSRF-TOKEN': $scope.token
				}
			}).success(function(response) {
				mensaje = 'Se guardo correctamente.';
				defineMensajeEvento(mensaje, true, $scope);
				$scope.evento = '';
				cargaEventos($scope, $http);
			}).error(function(response) {
				mensaje = "Ocurrio un error al tratar de guardar.";
				defineMensajeEvento(mensaje, false, $scope);
			});

	}

	$scope.showAllSubCategoria = function(categoria_id) {

			$http({
				method: 'get',
				url: '/showAllSubCategoria/' + categoria_id,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).success(function(response) {
				$scope.lsubcategoria = response;
			}).error(function(response) {
				mensaje = 'Ocurrió un error al tratar de cargar las categorias.';
				alertify.error(mensaje);			
			});
	}

	$scope.showAllPrincipal = function() {


	}	

}]);

function showAllPrincipal(scope, http){
			http({
				method: 'get',
				url: '/showAllPrincipal',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).success(function(response) {
				scope.lcategoriap = response;
			}).error(function(response) {
				mensaje = 'Ocurrió un error al tratar de cargar las categorias';
				alertify.error(mensaje);			
			});	
}





function valida(scope) {
	scope.estado = 'Error';
	scope.estilo = 'alert alert-danger fade in';
	scope.showmensaje = true;

	var nombre = document.getElementById("nombre").value;

	if (!validaVacion(clave)) {
		nombreCampo = 'Nombre';
		scope.mensajes = 'El campo ' + nombreCampo + ', es necesario';
		return false;
	}
}

function validaVacion(valor) {
	if (valor == '' || typeof valor == "undefined") {
		return false;
	}
	return true;
}