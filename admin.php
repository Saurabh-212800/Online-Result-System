<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="download.png" />
	<link rel="stylesheet" type="text/css" href="style.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<title>Admin Page</title>
</head>
<body>
	<div class="form">
		<p>Admin Login</p>
		<hr>
			<form action="" method="POST">
				<div style="padding-right: 20px">
					<i style="padding-right: 5px" class="fa fa-user"></i>
					<input style="width: 65%" type="txt" name="username" placeholder="Username" autocomplete="off" required;>
				</div>
				<div >
					<i style="padding-right: 1px ;padding-bottom: 10px" class="fa fa-key"></i>
					<input type="password" name="password" placeholder="Password" required id="password">
					<span>
        				<i style="cursor: pointer;" class="fa fa-eye" id="eye" onclick="toggle()"></i>
				    </span>
				</div>
				<div style="color: red">
					<?php
						include("db.php");
						if (isset($_POST['Login'])) {
							$username=$_POST["username"];
							$password=$_POST["password"];
							$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
							$runquery = mysqli_query($conn , $sql);
							if ($row=mysqli_fetch_array($runquery)) {
								if ($password=$row["password"]) {
									echo '
									<script type="text/javascript" language="javascript">
									alert("Login Successfully !");
									window.location="adminlogin.php";
									</script>';
									exit();
								}
								else
									echo '
									<script type="text/javascript" language="javascript">
									alert("Invalid Username or Password !");
									window.location="admin.php";
									</script>';
							}
							else
								echo '
									<script type="text/javascript" language="javascript">
									alert("Invalid Username or Password !");
									window.location="admin.php";
									</script>';
						}
					?>
				</div>
				<div>
					<input type="submit" name="Login" value="Login" class="submit" style="width: 20%; margin-bottom: 10px; border: 1px solid black; background-color: skyblue ; cursor: pointer; border-radius: 5px">
				</div>
				<div class="message">Not registered? <a href="registerFaculty.php">Create an account</a></div>
			</form>
		</div>
	<form action="index.php" style="text-align: right;">
		<button class="back">Back</button>
	</form>
	<script type="text/javascript">
		var state= false;
		function toggle(){
			if(state){
				document.getElementById("password").setAttribute("type","password");
				document.getElementById("eye").style.color="black";
				state = false;
		    }
		    else{
				document.getElementById("password").setAttribute("type","text");
				document.getElementById("eye").style.color="blue";
				state = true;
		    }
		}
	</script>
</body>
</html>