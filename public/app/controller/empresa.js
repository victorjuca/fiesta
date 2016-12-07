var app = angular.module('empresaModule', []);
app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('%%');
	$interpolateProvider.endSymbol('%%');
});
app.directive('fileModel', ['$parse', function($parse) {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			var model = $parse(attrs.fileModel);
			var modelSetter = model.assign;

			element.bind('change', function() {
				scope.$apply(function() {
					modelSetter(scope, element[0].files[0]);
				});
			});
		}
	};
}]);

var imagen;

app.controller('empresaAdmonController', ['$scope', '$http', function($scope, $http) {

	cargaEstado($scope, $http);

	$scope.cargaMunicipio = function(id) {
		cargaMunicipio($scope, $http,id);
	}


	
	$scope.lanzamodal = function() {
		$('#modalImagen').modal('show');
	};

    $scope.guardaEmpresa = function () {
        console.log($scope.empresa);
    };

}]);

function cargaEstado(scope, http){
    http({
        method: 'get',
        url: '/getAllEstados',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).success(function (response) {
        scope.lestado = response;
    }).error(function (response) {
        mensaje = 'Ocurrió un error al tratar de cargar los estados.';
        alertify.error(mensaje);
    });	
}

function cargaMunicipio(scope, http, id){
    http({
        method: 'get',
        url: '/getEstados/'+id,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).success(function (response) {
        scope.lmunicipio = response;
    }).error(function (response) {
        mensaje = 'Ocurrió un error al tratar de cargar los municipios del estado.';
        alertify.error(mensaje);
    });	
}

window.onload = function() {
	var options = {
		imageBox: '.imageBox',
		thumbBox: '.thumbBox',
		spinner: '.spinner',
		imgSrc: 'avatar.png'
	}
	var cropper = new cropbox(options);
	document.querySelector('#file').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = new cropbox(options);
		}
		reader.readAsDataURL(this.files[0]);
		//this.files = [];
	})
	document.querySelector('#btnCrop').addEventListener('click', function() {
		var img = cropper.getDataURL();
		//document.querySelector('.cropped').innerHTML = '<img id="imagen_principal" ng-model="empresa.imagen_principal"  src="' + img + '">';
		document.getElementById('imagen_principal').setAttribute( 'src', img);
		imagen = img;
		$('#modalImagen').modal('hide');
	})
	document.querySelector('#btnZoomIn').addEventListener('click', function() {
		cropper.zoomIn();
	})
	document.querySelector('#btnZoomOut').addEventListener('click', function() {
		cropper.zoomOut();
	})
};


function validaNombre(valor){
	var estado = true;
	if (valor == null || valor.length == 0) {
        mensaje = "El Nombre no debe estar vacio.";
        estado = false;
	}
	if (valor.length < 6) {
		mensaje = 'El campo Nombre debe de tener por lo menos 5 caracteres.';
		estado = false;
	}
	if (valor.length > 40) {
		mensaje 'El campo Nombre no debe de tener más de 40 caracteres.';
		estado = false;
	}

	if(!estado){
		alertify.error(mensaje);
	}
	return estado;
}

function validaDescripcion(valor){
	var estado = true;
	var campo = "Descripción";
	if (valor == null || valor.length == 0) {
        mensaje = "El "+campo+" no debe estar vacio.";
        estado = false;
	}
	if (valor.length < 20) {
		mensaje = 'El campo '+campo+' debe de tener por lo menos 20 caracteres.';
		estado = false;
	}
	if (valor.length > 400) {
		mensaje 'El campo '+campo+' no debe de tener más de 400 caracteres.';
		estado = false;
	}

	if(!estado){
		alertify.error(mensaje);
	}
	return estado;
}
function validaMunicipio(valor){

	var estado = true;
	var campo = "Municipio";

	if(valor === 0){
        mensaje = "Debes seleccionar un Municipio.";
        estado = false;		
	}

	if(!estado){
		alertify.error(mensaje);
	}	

	return estado;
}

function validaDescripcion(valor){
	var estado = true;
	var campo = "Teléfono";
	if (valor == null || valor.length == 0) {
        mensaje = "El "+campo+" no debe estar vacio.";
        estado = false;
	}

	if (!(/^\d{10}$/.test(valor))) {
		mensaje =  'El campo Tel. o Celular es incorrecto.';
	}

	if(!estado){
		alertify.error(mensaje);
	}
	return estado;
}
function validaImagen(valor){

	var estado = true;

	if (valor == null || valor.length == 0) {
        mensaje = "Debe seleccionar una imagen.";
        estado = false;
	}

	if(!estado){
		alertify.error(mensaje);
	}
	return estado;
}
