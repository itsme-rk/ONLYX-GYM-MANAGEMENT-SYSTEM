var app = angular.module('myApp', []);

app.controller('authController', function ($scope) {
    $scope.isLogin = true;
    $scope.isAdmin = false;

    $scope.toggleAuth = function () {
        $scope.isLogin = !$scope.isLogin;
        $scope.isAdmin = false;
    };

    $scope.login = function () {
        // Implement login logic here
        console.log('User Login:', $scope.username, $scope.password);
    };

    $scope.signup = function () {
        // Implement signup logic here
        console.log('User Signup:', $scope.signupUsername, $scope.email, $scope.signupPassword, $scope.confirmPassword);
    };

    $scope.adminLogin = function () {
        var adminUsername = $scope.adminUsername;
        var adminPassword = $scope.adminPassword;
        
        if (adminUsername === 'admin' && adminPassword === 'password') {
            window.location.href = 'admin.html';
            $scope.isAdmin = true; // Set isAdmin to true if login is successful
            $scope.isLogin = false; // Set isLogin to false after successful login
        } 
    };
});
 