<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing - Gym Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        span {
            color: red;
            font-weight: 600px;
        }
        .navbar-nav {
            justify-content: center;
            align-items: center;
            margin-left: 20%;
        }
        .container {
            margin-top: 50px;
            text-align: center;
            color: #fff;
        }
        form {
            border: 2px solid red;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #222;
            color: #fff;
            border: 2px solid red;
            border-radius: 10px;
        }
        form label {
            color: #fff;
        }
        form input[type="text"] {
            background-color: #fff;
            color: #333;
        }
        form button {
            background-color: red;
            color: #fff;
            border: none;
        }
        table{
            border:2px solid red;
            padding: 20px;
            }
        th{
            color: white;
            background-color: red;
        }
        .footer {
            width: 100% !important;
        }
    </style>
</head>
<body>
<header>
        <h1>Admin Interface</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin-login.php"><img src="logo.jpg" alt="" height="80px" width="100px"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="aland.html"><span style="font-size: larger;"><b>OnlyX Admin Page</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="coach.php"><b><span>Coach</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="members.php"><b><span>Members</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="membership.php"><b><span>Membership</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="receptionist.php"><b><span>receptionist</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="billing.php"><b><span>billing</span></b></a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 style="text-align:center; color:#fff; margin-top: 25px;">BILLING DETAILS</h1>
<div class="container">
    <!-- Form for adding billing details -->
    <form id="billingForm" action="process_billing.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputBillingID">Billing ID</label>
                <input type="text" name="billing_id" class="form-control" id="inputBillingID" placeholder="Billing ID" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMemberID">Member ID</label>
                <div class="input-group">
                    <input type="text" name="member_id" class="form-control" id="inputMemberID" placeholder="Member ID" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="btnGetMemberDetails">Get</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Input fields for member details -->
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" readonly>
        </div>
        <div class="form-group">
            <label for="inputGender">Gender</label>
            <input type="text" name="gender" class="form-control" id="inputGender" placeholder="Gender" readonly>
        </div>
        <div class="form-group">
            <label for="inputDOB">Date of Birth</label>
            <input type="text" name="date_of_birth" class="form-control" id="inputDOB" placeholder="Date of Birth" readonly>
        </div>
        <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone" readonly>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" readonly>
        </div>
        <div class="form-group">
            <label for="plan">Plan:</label>
            <select class="form-control" id="plan" name="plan">
                <option value="basic">Basic</option>
                <option value="elite">Elite</option>
                <option value="pro">Pro</option>
                <option value="home">Home (Virtual)</option>
                <option value="personal_trainer">Personal Trainer (Home)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputAmount">Amount</label>
            <input type="text" name="amount" class="form-control" id="inputAmount" placeholder="Amount">
        </div>
        <!-- Input field for billing date -->
        <div class="form-group">
            <label for="inputBillingDate">Billing Date</label>
            <input type="date" name="billing_date" class="form-control" id="inputBillingDate" placeholder="Billing Date">
        </div>
        <div class="form-group">
            <label>Payment Option:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_option" id="cash" value="cash">
                <label class="form-check-label" for="cash">Cash</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_option" id="upi" value="upi">
                <label class="form-check-label" for="upi">UPI</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_option" id="netbanking" value="netbanking">
                <label class="form-check-label" for="netbanking">Netbanking</label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>

    <!-- Display billing data -->
    <div id="billingData" style="margin-top: 50px;">
        <?php
        include "config.php";

        // Retrieve billing data from the database
        $sql = "SELECT * FROM billing";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Billing Data</h2>";
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Billing ID</th>";
            echo "<th>Member ID</th>";
            echo "<th>Plan</th>";
            echo "<th>Amount</th>";
            echo "<th>Billing Date</th>";
            echo "<th>Payment Option</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['billing_id'] . "</td>";
                echo "<td>" . $row['member_id'] . "</td>";
                echo "<td>" . $row['plan'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['billing_date'] . "</td>";
                echo "<td>" . $row['payment_option'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No billing data available";
        }

        // Close connection
        mysqli_close($connection);
        ?>
    </div>
</div>

        <footer class="footer mt-auto py-3 bg-dark" style="width: 100%;">
            <div class="container text-center">
                <span class="text-muted">© 2024 OnlyX Management System. All rights reserved.</span>
            </div>
        </footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Function to handle form submission
            $("#submitForm").click(function(){
                // Serialize form data
                var formData = $("#billingForm").serialize();
                // Send AJAX request to process form data
                $.ajax({
                    url: "process_billing.php",
                    type: "POST",
                    data: formData,
                    success: function(response){
                        // Refresh billing data display section
                        $("#billingData").load(location.href + " #billingData");
                        // Clear form fields
                        $("#billingForm")[0].reset();
                    },
                    error: function(xhr, status, error){
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });

            // Function to handle click event on the "Get" button
            $("#btnGetMemberDetails").click(function(){
                // Retrieve the member ID entered by the user
                var memberID = $("#inputMemberID").val();
                // Make an AJAX request to get member details
                $.ajax({
                    url: 'get_member_details.php',
                    type: 'GET',
                    data: { member_id: memberID },
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            // Populate the form fields with the retrieved member details
                            $("#inputName").val(response.member.name);
                            $("#inputGender").val(response.member.gender);
                            $("#inputDOB").val(response.member.dob ? response.member.dob : ''); // Handle null case
                            $("#inputPhone").val(response.member.phone);
                            $("#inputEmail").val(response.member.email);
                        } else {
                            alert("Member not found or error occurred");
                        }
                    },
                    error: function(xhr, status, error){
                        alert("Error occurred while processing your request: " + error);
                        console.log(xhr.responseText); // Log the response text to the console
                    }
                });
            });
        });
    </script>
</body>
</html>