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


app.controller('empresaAdmonController', ['$scope', '$http', function($scope, $http) {

	$scope.lanzamodal = function() {
		$('#modalImagen').modal('show');
	};
        $scope.guardaEmpresa = function () {

        	console.log($scope.empresa);
        	console.log(angular.element(document.querySelector('.cropped')) );

        };


}]);


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
		document.querySelector('.cropped').innerHTML = '<img id="imagen_principal" ng-model="empresa.imagen_principal"  src="' + img + '">';
		$('#modalImagen').modal('hide');
	})
	document.querySelector('#btnZoomIn').addEventListener('click', function() {
		cropper.zoomIn();
	})
	document.querySelector('#btnZoomOut').addEventListener('click', function() {
		cropper.zoomOut();
	})
};