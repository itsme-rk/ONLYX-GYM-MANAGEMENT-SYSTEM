<!DOCTYPE html>
<html lang="en" ng-app="memberRegistrationApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch User Details</title>
    <style>
        body {
            background-color: #1c1c1c;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #ff3c00;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ff3c00;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            background-color: #333;
            color: #fff;
            border: 1px solid #ff3c00;
        }

        textarea {
            height: 150px;
        }

        button {
            background-color: #ff3c00;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d13200;
        }

        input:invalid,
        select:invalid,
        textarea:invalid {
            border: 2px solid #ff3c00;
        }

        ::placeholder {
            color: #666;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>

<body ng-controller="memberRegistrationController">
    <h2>Fetch User Details</h2>
    <form action="fetch_user_details.php" method="post">
        <label for="memberId">Member ID:</label>
        <input type="text" id="memberId" name="memberId" ng-model="memberId" required><br>

        <button type="submit">Get User Details</button>
    </form>

    <div ng-if="userDetails">
        <h2>User Details</h2>
        <p>Name: {{ userDetails.name }}</p>
        <p>Username: {{ userDetails.username }}</p>
        <p>Gender: {{ userDetails.gender }}</p>
        <p>Date of Joining: {{ userDetails.dateOfJoining }}</p>
        <p>Date of Birth: {{ userDetails.dateOfBirth }}</p>
        <p>Phone: {{ userDetails.phone }}</p>
        <p>Email: {{ userDetails.email }}</p>
        <p>Coach: {{ userDetails.coach }}</p>
    </div>

    <script>
        var app = angular.module('memberRegistrationApp', []);

        app.controller('memberRegistrationController', function ($scope, $http) {
            $scope.userDetails = null;

            $scope.submitForm = function () {
                var memberId = $scope.memberId;

                $http.post('fetch_user_details.php', { memberId: memberId })
                    .then(function (response) {
                        $scope.userDetails = response.data;
                    });
            };
        });
    </script>
</body>

</html>
