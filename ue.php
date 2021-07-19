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
		<a href="cp.php"><i class="fas fa-sliders-h"></i><span>Change Password</span></a>
		<a href="users.php"><i class="fa fa-user"></i><span>Users</span></a>
	</div>
	<div id="allrecords">
		<form action="" method="POST" class="student">
			<div style="color: red">
				<?php 
					include("db.php");
					if (isset($_POST['Confirm'])) {
						$id=$_POST["id"];
						$name=$_POST["name"];
						$username=$_POST["username"];
						$sql1 = "SELECT * FROM admin";
						$runquery1 = mysqli_query($conn, $sql1);
						if ($row=mysqli_fetch_array($runquery1)) {
							if ($id!=$row["id"]) {
									mysqli_query($conn,"UPDATE admin SET name='$name',username='$username' WHERE id='$id'");
									echo '<script type="text/javascript" language="javascript">
									alert("* Record is Updated");
									window.location="users.php";
									</script>';
								}else
								echo "* Id already Exist try for another";
						}else
						echo "* Somenthing went wrong !!";
					}
				?>
			</div>
			<h2>Upadate Data</h2>
			<div>
				<input type="txt" name="id" placeholder="User Id" required>
			</div>
			<div>
				<input type="txt" name="name" placeholder="Enter Name" required>
			</div>
			<div>
				<input type="text" name="username" placeholder="Username" required>
			</div>
			<div>
				<input type="submit" name="Confirm" style="width: 20%; margin-bottom: 10px; border: 1px solid black; background-color: skyblue; cursor: pointer; border-radius: 5px;">
			</div>
		</form>
    </div>
</body>
</html> 