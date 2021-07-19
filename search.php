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
		<h2>All Records</h2>
    	<?php
			include("db.php");
			$roll=$_POST['roll'];
			$x=mysqli_query($conn,"SELECT * FROM student WHERE roll='$roll'");
			$cn=mysqli_num_rows($x);
			if ($cn > 0){
				$y=mysqli_fetch_array($x);
				$sem=$y['sem'];
				$name=$y['name'];
				$stud_id=$y['stud_id'];
				$class=$y['class'];
				$a=mysqli_query($conn,"SELECT * FROM result WHERE roll='$roll' AND sem='$sem'");
				$b=mysqli_fetch_array($a);
			}
			else
			"Invalid";
			$m=mysqli_query($conn,"SELECT * FROM subject WHERE sem='$sem'");
				$n=mysqli_fetch_array($m);
				$total = $b['s1'] + $b['s2'] + $b['s3'] + $b['s4'] + $b['s5'];
				$percentage = ($total*100)/500;

				if($percentage<=35)
				{
					$grade="Fail";
				}
				elseif($percentage>=36 && $percentage<=50)
				{
					$grade="C";
				}
				elseif($percentage>=51 && $percentage<=60)
				{
					$grade="B";
				}
				elseif($percentage>=61 && $percentage<=70)
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
		<div class="result">
			<header style="font-size: 30px"><b>Result</b></header>
			<table>
				<tr>
					<td style="border: none">
						<b>Student ID :</b><?php echo $stud_id;?><br>		
						<b>Name : </b><?php echo $name;?><br>
						<b>Exam seat Number : </b><?php echo $roll;?><br>
					</td>
					<td style="border: none">
						<b>Class : </b><?php echo $class;?><br>
						<b>Semester : </b><?php echo $sem;?>
					</td>
					<td style="border: none">
						<a style="width: 10%" href="edit.php?stud_id=<?php echo $row['stud_id']; ?>">
							<button class="button2">
									<b>Edit</b>
							</button>
						</a>
						<a style="width: 10%" href="delete.php?stud_id=<?php echo $row['stud_id']; ?>">
							<button class="button1">
								<b>Delete</b>
							</button>
						</a>
					</td>
				</tr>
			</table>
			<table style="position: relative;">
				<tr>
					<td><b>Subjects</b></td>
					<td><b>Marks</b></td>
					<td><b>Max Marks</b></td>
				</tr>
				<tr>
					<td>
						<?php echo $n['S1'];?>
					</td>
					<td>
						<?php echo $b['s1'];?>
					</td>
					<td>
						<?php echo 100;?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $n['S2'];?>
					</td>
					<td>
						<?php echo $b['s2'];?>
					</td>
					<td>
						<?php echo 100;?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $n['S3'];?>
					</td>
					<td>
						<?php echo $b['s3'];?>
					</td>
					<td>
						<?php echo 100;?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $n['S4'];?>
					</td>
					<td>
						<?php echo $b['s4'];?>
					</td>
					<td>
						<?php echo 100;?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $n['S5'];?>
					</td>
					<td>
						<?php echo $b['s5'];?>
					</td>
					<td>
						<?php echo 100;?>
					</td>
				</tr>
			</table>
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
		</div>
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