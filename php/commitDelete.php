<?php
	include 'functionLib.php';
	$num = $_GET['num'];
	$UserName = urldecode($_COOKIE['user']);
	include 'connentSQL.php';
	$dlcommit = mysqli_query($link,"DELETE FROM commit WHERE commit.Num = $num AND commit.UserID = (select users.UserID from users where UserName='$UserName')");
	header('location:/page/commit.php');