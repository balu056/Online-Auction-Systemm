<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction System</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/main-ui.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<script src="js/jquery.js" ></script>
<script src="js/jquery.min.js"></script>
<?php
session_start();
include('config.php');
ob_start();
 ?>
<style>
body{
background: linear-gradient(135deg,#667eea,#764ba2);
min-height:100vh;
font-family:'Segoe UI',sans-serif;
}

.banner{
margin:20px;
color:white;
text-align:center;
}
		.menu
		{
			margin-top:100px;
		}
		.menu a{
font-size:18px;
color:white;
margin-right:20px;
text-decoration:none;
padding:8px 18px;
border-radius:25px;
background:rgba(255,255,255,0.2);
}

.menu a:hover{
background:white;
color:#333;
}
		.menu .active
		{
			background-color:#367d44;
			padding:10px;
			border-radius:3px;
			text-decoration:none;
			color:#fff;
		}

.panel-login{
border:none;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.3);
background:white;
padding:20px;

	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login{
background:#667eea;
color:white;
border:none;
border-radius:25px;
font-size:16px;

	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}

.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

</style>
<script>

$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
</head>

<body>

<div class="hero-banner">
    <div class="hero-content">
        <h1>ONLINE AUCTION SYSTEM</h1>
        <p>Bid • Buy • Sell Products Online</p>

        
    </div>
</div>
<div class="clearfix"></div>

<div class="menu">
<div class="container">
<div class="menu">
<a href="index.php">Bidder</a>
<a href="slogin.php">Seller</a>
<a href="alogin.php">Admin</a>
</div>
</div>
</div>

<div class="login">
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Bidder Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link"> Bidder Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email"  tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login" id="login" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									
								</form>
								<form id="register-form"  method="post" role="form" style="display: none;">
                               
									<div class="form-group">
										<input type="text" name="name"  tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									
                                   <div class="form-group">
										<textarea name="address" tabindex="1" class="form-control" placeholder="Address" value=""></textarea>
									</div>
                                    
									<div class="form-group">
										<input type="text" pattern="[789][0-9]{9}"  name="contact" id="contact" tabindex="2" class="form-control" placeholder="Contact number">
									</div>
                                    
                                    <div class="form-group">
										<input type="password"  name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>
<?php 

if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$password=$_POST['password'];

$insert=mysqli_query($conn,"INSERT INTO bidder(bname,email,address,contact,password) 
VALUES('$name','$email','$address','$contact','$password')") or die(mysqli_error($conn));

if($insert)
{
echo '<script>alert("Registration success.");</script>';
}
else
{
echo '<script>alert("Sorry! Try again later.");</script>';
}
}

?>

<?php 

if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM bidder WHERE email='$email' AND password='$password'";

$res=mysqli_query($conn,$sql);

$count=mysqli_num_rows($res);

if($count>0)
{
$_SESSION['bidderid']=$email;
header("location:view.php");
}
else
{
echo '<script>alert("Invalid username or password");</script>';
}
}

ob_end_flush();

?>


</body>
</html>