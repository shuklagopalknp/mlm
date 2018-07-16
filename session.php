<?php
session_start();
if(isset($_SESSION['email'])){
	}
	
	else{
		echo "<script>window.location='login.php';</script>;";
	}
?>