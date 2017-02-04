(function () {
    'use strict';
    angular.module('admin')
        .controller('EditController', EditController);

    EditController.$inject = ['$scope', '$http', '$window', '$location', '$rootScope'];
    
    function EditController($scope, $http, $window, $location, $rootScope) {
        
        $scope.init = function()
        {
            $http.get('admin/get-item' + $rootScope.id)
            .then(
                function(response) 
                {
                    $scope.item = response.data;
                    console.log(response.data);
                },
                function(response)
                {
                console.log(response);
                }
            );
        }
    }
})();
