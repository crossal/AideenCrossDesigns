<?php
	include('../config.php');
	session_start();
	
	$username_check = $_SESSION['login_user'];
	
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	$stmt = $mysqli->prepare("SELECT id, username FROM admins WHERE username = ? LIMIT 1");
	$stmt->bind_param('s', $username_check);
	$stmt->execute();
	$stmt->store_result();
		
	// get variables from result.
	$stmt->bind_result($user_id, $username);
	$stmt->fetch();
	
	if(!isset($_SESSION['login_user']) || $stmt->num_rows != 1){
		header("location:site-management.php");
	}
?>