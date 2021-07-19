<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="download.png" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
	<input type="checkbox" id="check">
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div class="left">
			<h3>Dash<span>board</span></h3>
		</div>
		<div class="right">
			<a href="logout.php" class="logout">Logout</a>
		</div>
	</header>
	<div>
		<div>
			<i class="fa fa-bars"></i>
		</div>
	</div>
	<div class="sidebar">
		<a href="adminlogin.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
		<a href="allrecords.php"><i class="fas fa-table"></i><span>All Records</span></a>
		<a href="addnewrecord.php"><i class="fas fa-th"></i><span>Add Records</span></a>
		<a href="#"><i class="fas fa-sliders-h"></i><span>Change Password</span></a>
		<a href="users.php"><i class="fa fa-user"></i><span>Users</span></a>
	</div>
	<div id="allrecords">
		<form action="" method="POST" class="password">
			<h2>Change Password</h2>
			<div>Enter Old Password : 
				<input type="password" name="old" placeholder="Enter Old Password" required>
			</div>
			<div>Enter New password : 
				<input type="password" name="p1" placeholder="Enter New Password" required>
			</div>
			<div>Confirm New Password : 
				<input type="password" name="p2" placeholder="Confirm New Password" id="password" required>
				<span>
        			<i class="fa fa-eye" id="eye" onclick="toggle()"></i>
				</span>
			</div>
			<div style="color: red">
				<?php
					include("db.php");
					if (isset($_POST['Confirm'])) {
						$old=$_POST["old"];
						$p1=$_POST["p1"];
						$p2=$_POST["p2"];
						$sql = "SELECT * FROM admin";
						$runquery = mysqli_query($conn , $sql);
						if ($row=mysqli_fetch_array($runquery)) {
							if ($old==$row["password"]) {
								if($p1==$p2){
									$username=$row["username"];
									mysqli_query($conn,"UPDATE admin SET password='$p2' WHERE username='$username'");
									echo '<script type="text/javascript" language="javascript">
									alert("* Password Change successfully !");
									window.location="adminlogin.php";
									</script>';
								}else
								echo "* New password not match !";
							}
							else
								echo "* Old password not match !";
						}
						else
							echo "* Invalid Password !";
					}
				?>
			</div>
			<div>
				<input type="submit" name="Confirm" style="width: 20%; margin-bottom: 10px; border: 1px solid black; background-color: skyblue; cursor: pointer; border-radius: 5px">
			</div>
		</form>
    </div>
    <script type="text/javascript">
		var state= false;
		function toggle(){
			if(state){
				document.getElementById("password").setAttribute("type","password");
				document.getElementById("eye").style.color='#000000';
				state = false;
		    }
		    else{
				document.getElementById("password").setAttribute("type","text");
				document.getElementById("eye").style.color='#5887ef';
				state = true;
		    }
		}
	</script>
</body>
</html> 