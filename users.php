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
		<h2><center>Users</center></h2>
		<table>
 			<tr>
				<td style="padding: 5px;"><b> Id </b></td>
				<td><b> Username </b></td>
				<td><b> Password </b></td>
				<td><b> Delete </b></td>
				<td><b> Update </b></td>
 			</tr>
			<?php
				include('db.php'); 
 				$sql="SELECT * FROM admin";
				$query = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($query)){
					?>
					 <tr>
						 <td><?php echo $row['id'];  ?> </td>
						 <td><?php echo $row['username'];  ?> </td>
						 <td><?php echo $row['password'];  ?> </td>
						 <td>
						 	<a href="ud.php?id=<?php echo $row['id']; ?>">
							<button class="button1">
								<b>Delete</b>
							</button>
							</a>
						 </td>
						 <td>
						 	<a href="ue.php?id=<?php echo $row['id']; ?>">
							<button class="button2">
								<b>Update</b>
							</button>
							</a>
						 </td>
					 </tr>
 					<?php 
 				}
  			?>
  		</table>  
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