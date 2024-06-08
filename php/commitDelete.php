<?php
	$num = $_GET['num'];
	$UserName = urldecode($_COOKIE['user']);
	$link = mysqli_connect('localhost','user','123456','users');
	$dlcommit = mysqli_query($link,"DELETE FROM commit WHERE commit.Num = $num AND commit.UserID = (select users.UserID from users where UserName='$UserName')");
	header('location:../page/commit.php');