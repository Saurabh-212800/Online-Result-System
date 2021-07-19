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
		<a href="#"><i class="fas fa-th"></i><span>Add Records</span></a>
		<a href="cp.php"><i class="fas fa-sliders-h"></i><span>Change Password</span></a>
		<a href="users.php"><i class="fa fa-user"></i><span>Users</span></a>
	</div>
	<div id="allrecords">
		<form action="" method="POST" class="student">
			<div style="color: red">
				<?php 
					include("db.php");
					if (isset($_POST['Confirm'])) {
						$stud_id=$_POST["stud_id"];
						$name=$_POST["name"];
						$roll=$_POST["roll"];
						$class=$_POST["class"];
						$sem=$_POST["sem"];

						$S1=$_POST["S1"];
						$S2=$_POST["S2"];
						$S3=$_POST["S3"];
						$S4=$_POST["S4"];
						$S5=$_POST["S5"];

						$s1=$_POST["s1"];
						$s2=$_POST["s2"];
						$s3=$_POST["s3"];
						$s4=$_POST["s4"];
						$s5=$_POST["s5"];

						$sql1 = "SELECT * FROM student";
						$runquery1 = mysqli_query($conn, $sql1);
						if ($row=mysqli_fetch_array($runquery1)) {
							if ($stud_id!=$row["stud_id"]) {
								if ($roll!=$row["roll"]) {
									mysqli_query($conn,"INSERT INTO student (stud_id, name, roll, class, sem) VALUES ('$stud_id', '$name', '$roll', '$class', '$sem')");

									mysqli_query($conn,"INSERT INTO subject(stud_id, sem, s1, s2, s3, s4, s5) VALUES ('$stud_id','$sem','$S1','$S2','$S3','$S4','$S5');");

									mysqli_query($conn,"INSERT INTO result(stud_id, roll, sem, s1, s2, s3, s4, s5) VALUES ('$stud_id','$roll','$sem','$s1','$s2','$s3','$s4','$s5');");

									mysqli_query($conn,"INSERT INTO class(stud_id, class, sem) VALUES ('$stud_id','$class','$sem');");

									echo '<script type="text/javascript" language="javascript">
									alert("* Record is Added Successfully");
									window.location="addnewrecord.php";
									</script>';
								}else
								echo "* Student Roll number is exist ! Please try Another roll Number";
							}else
							echo "* Student Id exist ! Please try Another Student Id";
						}else
						echo "* Somenthing went wrong !!";
					}
				?>
			</div>
			<h2>Add Data</h2>
			<div>
				<input type="text" name="stud_id" placeholder="Student Id" required autocomplete="off">
			</div>
			<div>
				<input type="txt" name="name" placeholder="Enter Name" required autocomplete="off">
			</div>
			<div>
				<input type="text" name="roll" placeholder="Roll Number" required autocomplete="off">
			</div>
			<div>
		        <select name="class" required autocomplete="off">
					<option value="none">-Select Class-</option>
					<option value="SE">SE</option>
					<option value="TE">TE</option>
					<option value="BE">BE</option>
				</select>
			</div>
			<select name="sem" required autocomplete="off">
				<option value="none">-Select Semester-</option>
				<option value="First">First</option>
				<option value="Second">Second</option>
				<option value="Third">Third</option>
				<option value="Fourth">Fourth</option>
				<option value="Fifth">Fifth</option>
				<option value="Sixth">Sixth</option>
				<option value="Seventh">Seventh</option>
				<option value="Eighth">Eighth</option>
			</select>
			<div>
				<td>
					Subject Name :
				</td>
				<td>
					Subject Marks
				</td>
			</div>
			<div>
				<td>
					<input type="text" name="S1" placeholder="Subject1 Name" required> :
				</td>
				<td>
					<input type="txt" name="s1" size="100" placeholder="Subject1 Marks" required>
				</td>
			</div>
			<div>
				<td>
					<input type="text" name="S2" placeholder="Subject2 Name" required> :
				</td>
				<td>
					<input type="txt" name="s2" size="100" placeholder="Subject2 Marks" required>
				</td>
			</div>
			<div>
				<td>
					<input type="text" name="S3" placeholder="Subject3 Name" required> :
				</td>
				<td>
					<input type="txt" name="s3" size="100" placeholder="Subject3 Marks" required>
				</td>
			</div>
			<div>
				<td>
					<input type="text" name="S4" placeholder="Subject4 Name" required> :
				</td>
				<td>
					<input type="txt" name="s4" size="100" placeholder="Subject4 Marks" required>
				</td>
			</div>
			<div>
				<td>
					<input type="text" name="S5" placeholder="Subject5 Name" required> :
				</td>
				<td>
					<input type="txt" name="s5" size="100" placeholder="Subject5 Marks" required>
				</td>
			</div>
			<div>
				<input type="submit" name="Confirm" style="width: 20%; margin-bottom: 10px; border: 1px solid black; background-color: skyblue; cursor: pointer; border-radius: 5px;">
			</div>
		</form>
    </div>
</body>
</html> 