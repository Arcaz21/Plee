<?php session_start();
print_r($_SESSION);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	header('location: index.php');
?>