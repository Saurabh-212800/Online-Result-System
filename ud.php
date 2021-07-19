<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="download.png" />
	<title>Admin Login</title>
</head>
<body>
<?php
include("db.php");
$id=$_GET["id"];
$sql = "SELECT * FROM admin WHERE id='$id'";
	$runquery = mysqli_query($conn , $sql);
		if ($runquery) {
			mysqli_query($conn,"DELETE FROM admin WHERE id='$id'");
			echo '<script type="text/javascript" language="javascript">
				alert("Successfully Deleted");
				window.location="users.php";
				</script>';	
		}
		else{
			echo "No Any Record is Deleted";
		}
		$conn->close();
?>
</body>
</html>