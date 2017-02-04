(function () {
    'use strict';
    angular.module('admin')
        .controller('PanelController', PanelController);

    PanelController.$inject = ['$scope', '$http', '$window', '$location'];
    
    function PanelController($scope, $http, $window, $location) {

    	$scope.init = function()
    	{
    		$http.get('admin/get-all-items')
    		.then(
    			function(response) 
    			{
    				$scope.items = response.data;
    				console.log(response.data);
    			},
    			function(response)
    			{
    			console.log(response);
    			}
    		);
    	};

    	$scope.editItem = function(id)
    	{
    		$location.path('/edit/' + id);	
    	}



    	// set Header fixed to top allways
    	var windowEl = angular.element($window);
      	var handler = function() {
        	$scope.scroll = windowEl.scrollTop();
      	}
      	windowEl.on('scroll', $scope.$apply.bind($scope, handler));
      	$scope.$watch('scroll', function() {
        	angular.element('thead').css('transform', 'translate(0px,'+ $scope.scroll + 'px)');
    	});

    	$scope.init();
    }
})();
