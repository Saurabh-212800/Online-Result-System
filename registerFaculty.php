<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="download.png" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<title>Admin Page</title>
</head>
<body>
	<div class="form">
		<p>Admin Registration</p>
		<hr>
			<form action="" method="POST">
				<div>
					<input style="width: 65%" type="text" name="id" placeholder="Id" autocomplete="off" required>
				</div>
				<div>
					<input style="width: 65%" type="txt" name="name" placeholder="Name" autocomplete="off" required;>
				</div>
				<div>
					<input style="width: 65%" type="txt" name="username" placeholder="Username" autocomplete="off" required;>
				</div>
				<div>
					<input type="password" name="password" placeholder="Password" required id="password">
					<span>
        				<i style="cursor: pointer;"class="fa fa-eye" id="eye" onclick="toggle()"></i>
				    </span>
				</div>
				<div style="color: red">
					<?php 
						include("db.php");
						if (isset($_POST['Submit'])) {
							$id=$_POST["id"];
							$name=$_POST["name"];
							$username=$_POST["username"];
							$password=$_POST["password"];
							$sql1 = "SELECT * FROM admin";
							$runquery1 = mysqli_query($conn, $sql1);
							if ($row=mysqli_fetch_array($runquery1)) {
								if ($id!=$row["id"]) {
									mysqli_query($conn,"INSERT INTO admin(id, name, username, password) VALUES ('$id','$name','$username','$password');");
									echo '
									<script type="text/javascript" language="javascript">
									alert("Account is Register !");
									window.location="admin.php";
									</script>';
								}else
									echo '
									<script type="text/javascript" language="javascript">
									alert("* ID is already Exist !!");
									window.location="registerFaculty.php";
									</script>';
							}else
							echo '<script type="text/javascript" language="javascript">
									alert("* Somenthing went wrong !!");
									window.location="registerFaculty.php";
									</script>';
						}
					?>
				</div>
				<div>
					<input type="submit" name="Submit" value="Submit" style="width: 20%; margin-bottom: 10px; border: 1px solid black; background-color: skyblue; cursor: pointer; border-radius: 5px">
				</div>
			</form>
		</div>
	<form action="admin.php" style="text-align: right;">
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