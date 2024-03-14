<?php
if (isset($_POST["submit"])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if ($username === 'admin' && $password === "password") {
        // Redirect to aland.html if credentials are correct
        header("Location: aland.html");
        exit(); // Terminate further script execution after redirection
    } else {
        // Display error message if credentials are wrong
        echo "<script>alert('Username or Password is incorrect! Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <style>
    img{
	width: 100%;
}
body{
  background-color: black;
}
.login {
    margin-top: 25%;
    width: 100%;
    position: relative;
}
.login_box {
    width: 1050px;
    height: 600px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
}
.login_box .left{
  width: 41%;
  height: 100%;
  padding: 25px 25px;
  
}
.login_box .right{
  width: 59%;
  height: 100%  
}
.left .top_link a {
    color: #452A5A;
    font-weight: 400;
}
.left .top_link{
  height: 20px
}
.left .contact{
	display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
}
.left h3{
  text-align: center;
  margin-bottom: 40px;
  font-size: 30px;
  font-weight: 600;
}
.left input {
    border: none;
    width: 80%;
    margin: 15px 0px;
    border-bottom: 1px solid #4f30677d;
    padding: 7px 9px;
    width: 100%;
    overflow: hidden;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
}
.left{
	background: linear-gradient(-45deg, #dcd7e0, #fff);
}
.left img{
  margin-left: 120px;
}

.submit {
    border: none;
    padding: 15px 70px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 90px;
    background: red;
    color: #fff;
    font-weight: bold;
    /* -webkit-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1); */
    box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
    margin-bottom: 80px;
}


.right {
	background: url('back1.jpg');
	color: #fff;
	position: relative;
  background-size: cover;
  opacity: 0.75;
  background-color: red;
}

.right .right-text{
  height: 100%;
  position: relative;
  transform: translate(0%, 45%);
}
.right-text h2{
  display: block;
  width: 100%;
  text-align: center;
  font-size: 50px;
  font-weight: 500;
}
.right-text h5{
  display: block;
  width: 100%;
  text-align: center;
  font-size: 19px;
  font-weight: 400;
}

.right .right-inductor{
  position: absolute;
  width: 70px;
  height: 7px;
  background: #fff0;
  left: 50%;
  bottom: 70px;
  transform: translate(-50%, 0%);
}
.top_link img {
    width: 28px;
    padding-right: 7px;
    margin-top: -3px;
}
.login_box,.right{
  border: 3px solid red;
  border-radius: 30px;
}
.right-inductor{
  margin-bottom: 40px;
}

</style>
</head>
<body>
    

<section class="login">
		<div class="login_box">
			<div class="left">
      <img src="logo.jpg" alt="" style="height: 60px; width:100px;">
				<div class="top_link"><a href="index.html"><b> >Return home</b></a></div>
				<div class="contact">
					<form action="" method="post">
						<h3>ADMIN SIGN IN</h3>
						<input type="text" name="user"placeholder="USERNAME" required>
						<input type="text" name ="pass"placeholder="PASSWORD" required>
						<button class="submit" name="submit">LET'S GO</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>OnlyX GYM</h2>
					<h5>GYM MANAGEMENT SYSTEM</h5>
				</div>
				<div class="right-inductor"><img src="admin logo.jpg" alt=""></div>
			</div>
		</div>
	</section>
</body>
</body>
</html>
