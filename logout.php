
<?php
session_start();
unset($_SESSION["email"]);
session_destroy();
//header('location:../index.php');
echo "<script>window.location='index.php';</script>";

	
?>