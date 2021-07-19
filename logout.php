<?php
session_start();
unset($_SESSION['username']);
session_destroy();
?>
<script type="text/javascript" language="javascript">
	alert("* Logout successfully !");
	window.location="admin.php";
</script>
<?php
?>