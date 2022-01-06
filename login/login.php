<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
include "header.php";
//if(!isset($_SESSION['user']))
//{
	//header('location:../login/login.php');
//}

$user = new User;
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	//neu sai mat khau
	if($user->CheckLogin($username,$password)){
		//echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!")</script>';
		//header('location:../login/login.php');
		$_SESSION['username']=$username;
		header('location:../index.php'); 
	}
	elseif($user->CheckLoginAdmin($username,$password))
	{
		$_SESSION['username']=$username;
		header('location:../admin/index.php'); 
	}
	else
	{
		
		//header('location:../login/login.php');
		echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!")</script>'; 
	}
	//neu la admin
	/*if($user->CheckLoginAdmin($username,$password))	{
		$_SESSION['user']=$username;
		header('location:../admin/index.php'); 
		
	}
	else
	{
		echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!")</script>'; 
		header('location:../login/login.php');
	}*/
}
?>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					
				</div>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div  class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>