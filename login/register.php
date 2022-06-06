
<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
include "header2.php";
$user = new User;
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	if(empty($username))
	{
		echo '<script>alert("Username invalid!")</script>';
	}
	else if(empty($password))
	{
		echo '<script>alert("Password invalid!")</script>';
	}
	else if(empty($password_confirm))
	{
		echo '<script>alert("Password confirm invalid!")</script>';
	}
	else if($password!=$password_confirm)
	{
		echo '<script>alert("Password confirm invalid!")</script>';
	}
	else
	{
		if($user->CheckRegister($username,$password))
		{
			$_SESSION['username']=$username;
			header('location:../index.php'); 
		}
		else
		{
			echo '<script>alert("Register Fail!")</script>';
		}
	}
	
}
?>

<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
                <div class="d-flex justify-content-end social_icon">
					<span><a href=""><i class="fas fa-address-card"></a></i></span>
					
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
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password_confirm" class="form-control" placeholder="confirm password">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Sign up" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php">Sign In</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>