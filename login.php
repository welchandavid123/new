<?php 
session_start();
require_once("connection.php");?>
<style type="text/css">
	body{
		background-color: black;
		color: white;
		height: 100%;
		padding: 0;
		margin: 0;
	}
</style>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="img/asf.png">
</head>
<body>
	<form method="post">
		<br><br><br>
		<center>
		<div class="row">
			<div class="col-sm-12">
				<label>Username</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<input type="text" class="input"  name="username">
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-sm-12">
				<label>Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<input type="password" class="input"  name="password">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12">
				<button type="submit" name="login">LOGIN</button>
			</div>
		</div>
		<br><br><br><br>
		<div class="row">
			<div class="col-sm-12">
				<button><a href="register.php">REGISTER</a></button>
			</div>
		</div>
		</form>


	<?php
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$q = 'SELECT * FROM `site` WHERE `username` = "'.$username.'" AND `password` = "'.$password.'"  ';

			$r = mysqli_query($con, $q);
			if ($r) {
				if (mysqli_num_rows($r) > 0){
					$_SESSION['username'] = $username;
					header("location:add.html");
				}else{
					echo '<center><p style="color:red" class="p">Your username and password do not matched<p></center>'; 
				}
			}else{
				echo $q; 
			}
		}
	?>

</body>
</html>