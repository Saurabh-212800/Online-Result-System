<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>Online Result</title>
	<link rel="shortcut icon" href="download.png" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body style="padding: 40px">
	<center>
	<div>
		<?php
			include("db.php");
			$roll=$_POST['roll'];
			$class=$_POST['class'];
			$x=mysqli_query($conn,"SELECT * FROM student WHERE roll='$roll' And class='$class'");
			$cn=mysqli_num_rows($x);
			if ($cn > 0){
				$y=mysqli_fetch_array($x);
				$sem=$y['sem'];
				$name=$y['name'];
				$a=mysqli_query($conn,"SELECT * FROM result WHERE roll='$roll' AND sem='$sem'");
				$b=mysqli_fetch_array($a);
			}
			else
				echo '
				<script type="text/javascript" language="javascript">
				alert("Invalid Exam seat number or Class !!");
				window.location="index.php";
				</script>'
		?>
		<div class="result">
			<header style="font-size: 30px"><b>Result</b></header>
			<hr>
			<div>
				<b>Name : </b><?php echo $name;?><br>
				<b>Exam seat Number : </b><?php echo $roll;?><br>
				<b>Class : </b><?php echo $class;?><br>
				<b>Semester : </b><?php echo $sem;?>
			</div>
			<div>
			<?php $m=mysqli_query($conn,"SELECT * FROM subject WHERE sem='$sem'");
				$n=mysqli_fetch_array($m);
			?>
			<?php
				$total = $b['s1'] + $b['s2'] + $b['s3'] + $b['s4'] + $b['s5'];
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
				<div style="padding-top: 5px">Total : <?php echo"$total" ?></div>
				<div>Percentage : <?php echo "$percentage" ?>%</div>
				<div>Grade : <?php echo "$grade" ?></div>
				<div>Result : <?php echo "$result" ?></div>
			</div>
		</div>
		<div>
			<button class="print" onclick="window.print()">Print</button>
		</div>
	</center>
</body>
</html>