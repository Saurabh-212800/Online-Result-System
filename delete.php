<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="download.png" />
	<title>Admin Login</title>
</head>
<body>
<?php
include("db.php");
$stud_id=$_GET["stud_id"];
$sql = "SELECT * FROM student WHERE stud_id='$stud_id'";
	$runquery = mysqli_query($conn , $sql);
		if ($runquery) {
			mysqli_query($conn,"DELETE FROM student WHERE stud_id='$stud_id'");
			mysqli_query($conn,"DELETE FROM subject WHERE stud_id='$stud_id'");
			mysqli_query($conn,"DELETE FROM result WHERE stud_id='$stud_id'");
			mysqli_query($conn,"DELETE FROM class WHERE stud_id='$stud_id'");
			echo '<script type="text/javascript" language="javascript">
				alert("Successfully Deleted");
				window.location="allrecords.php";
				</script>';	
		}
		else{
			echo "No Any Record is Deleted";
		}
		$conn->close();
?>
</body>
</html>