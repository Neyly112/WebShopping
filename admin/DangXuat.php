<?php
	@include 'dbconnect.php';

	session_start();
	session_unset();
	seesion_destroy();


	header('location:TrangChu.php');
?>