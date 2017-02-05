(function () {
    'use strict';
    angular.module('admin')
        .controller('EditController', EditController);

    EditController.$inject = ['$scope', '$http', '$window', '$location', '$routeParams'];
    
    function EditController($scope, $http, $window, $location, $routeParams) {

        $scope.init = function()
        {
            $http.get('admin/get-item/' + $routeParams.id)
            .then(
                function(response) 
                {
                    $scope.item = response.data;
                    console.log($scope.item);
                },
                function(response)
                {
                    console.log(response);
                }
            );

            $http.get('admin/get-categories')
            .then(function(response) {    
                $scope.categories = response.data;
            })
        }

        $scope.init();
    }
})();
