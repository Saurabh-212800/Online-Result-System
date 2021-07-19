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
		<a href="#"><i class="fas fa-table"></i><span>All Records</span></a>
		<a href="addnewrecord.php"><i class="fas fa-th"></i><span>Add Records</span></a>
		<a href="cp.php"><i class="fas fa-sliders-h"></i><span>Change Password</span></a>
		<a href="users.php"><i class="fa fa-user"></i><span>Users</span></a>
	</div>
	<div id="allrecords">
		<h2>All Records</h2>
		<div>
			<center>
				<form action="search.php" method="POST">
					<i class="fa fa-search"></i>
					<input class="search" type="text" name="roll" placeholder="Enter Roll Number" required autocomplete="off">
					<button class="search1"><b>Search</b></button>
				</form>
			</center>
		</div>
		<hr>
    	<?php
			include("db.php");
			$sql = "SELECT student.stud_id , student.name , student.roll , student.sem , subject.S1, subject.S2, subject.S3, subject.S4, subject.S5 , result.s1, result.s2, result.s3, result.s4, result.s5 , class.class FROM student, subject , result , class WHERE student.stud_id=subject.stud_id AND (subject.stud_id=result.stud_id AND(student.sem=class.sem))";
			$runquery = mysqli_query($conn,$sql);
			$cn=mysqli_num_rows($runquery);
			if ($cn > 0){
				while ($row = mysqli_fetch_array($runquery)) {
					?>
					<div>
						<table>
							<h3>
							<tr>
								<td style="text-align: left; padding-left: 20px;border: none">
									<b>Student Id : </b><?php echo $row['stud_id'];?><br>
									<b>Name : </b><?php echo $row['name'];?><br>
									<b>Exam seat Number : </b><?php echo $row['roll'];?><br>
								</td>
								<td style="border: none">
									<b>Semester : </b><?php echo $row['sem'];?><br>
									<b>Class : </b><?php echo $row['class'];?>
								</td>
								<td style="border: none">
									<button class="button2">
										<a style="width: 10%;color: black;text-decoration: none;" href="edit.php?stud_id=<?php echo $row['stud_id']; ?>">
											<b>Edit</b>
										</a>
									</button>
									<button class="button1">
										<a style="width: 10%;color: black; text-decoration: none;" href="delete.php?stud_id=<?php echo $row['stud_id']; ?>">
												<b>Delete</b>
										</a>
									</button>
								</td>
							</tr>
							</h3>
						</table>
						<table>
							<tr>
								<td><b>Subjects</b></td>
								<td><b>Marks</b></td>
								<td><b>Max Marks</b></td>
							</tr>
							<tr>
								<td>
									<?php echo $row['S1'];?>
								</td>
								<td>
									<?php echo $row['s1'];?>
								</td>
								<td>
									<?php echo 100;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $row['S2'];?>
								</td>
								<td>
									<?php echo $row['s2'];?>
								</td>
								<td>
									<?php echo 100;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $row['S3'];?>
								</td>
								<td>
									<?php echo $row['s3'];?>
								</td>
								<td>
									<?php echo 100;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $row['S4'];?>
								</td>
								<td>
									<?php echo $row['s4'];?>
								</td>
								<td>
									<?php echo 100;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $row['S5'];?>
								</td>
								<td>
									<?php echo $row['s5'];?>
								</td>
								<td>
									<?php echo 100;?>
								</td>
							</tr>
						</table>
						<?php
							$total = $row['s1'] + $row['s2'] + $row['s3'] + $row['s4'] + $row['s5'];
							$percentage = ($total*100)/500;
							if($percentage<35)
							{
								$grade="Fail";
							}
							elseif($percentage>=36 && $percentage<=50)
							{
								$grade="C";
							}
							elseif($percentage>50 && $percentage<=60)
							{
								$grade="B";
							}
							elseif($percentage>60 && $percentage<=70)
							{
								$grade="A";
							}
							else
							{
								$grade="Distinction";
							}
							if ($grade=="Distinction"||$grade=="A"||$grade=="B"||$grade=="C")
							{
								$result = "Pass";
							}
							else
							{
								$result = "Fail";
							}
						?>
						<table>
							<td style="border: none">
								Total : <?php echo"$total" ?><br>
								Percentage : <?php echo "$percentage" ?>%
							</td>
							<td style="border: none">
								Grade : <?php echo "$grade" ?><br>
								Result : <?php echo "$result" ?>
							</td>
						</table>
						<hr>
					</div>
				<?php }
			}
			else{
			echo "Invalid Data ! No Records Found";
		}
		$conn->close();
		?>
	</div>
	<script type="text/javascript">
    	$(document).ready(function(){
    		$('.nav_btn').click(function(){
        		$('.mobile_nav_items').toggleClass('active');
      		});
    	});
    </script>
</body>
</html> 