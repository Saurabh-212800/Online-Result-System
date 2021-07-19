<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>Online Result</title>
	<link rel="shortcut icon" href="download.png" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<title>Online Results</title>
	<form action="admin.php">
		<button class="back">Admin</button>
	</form>
</head>
<body>
	<div class="form">
    <p>Result</p>
    <hr>
	    <form action="result.php" method="POST">
	    	<div>
	        	<input type="text" name="roll" placeholder="Exam Seat Number" required autocomplete="off">
	        </div>
	        <div>
		        <select name="class" required autocomplete="off">
					<option value="none">-select-</option>
					<option value="SE">SE</option>
					<option value="TE">TE</option>
					<option value="BE">BE</option>
				</select>
			</div>
			<div>
	        	<button>Result</button>
	        </div>
	    </form>
    </div>
</body>
</html>