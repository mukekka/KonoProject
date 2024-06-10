<?php
	$num = $_GET['num'];
	$UserName = urldecode($_COOKIE['user']);
	$link = mysqli_connect('localhost','user','123456','users');
	if ($link->connect_error){alt('服务器连接失败');exit();}
	else con('连接成功');
	$dlcommit = mysqli_query($link,"DELETE FROM commit WHERE commit.Num = $num AND commit.UserID = (select users.UserID from users where UserName='$UserName')");
	header('location:../page/commit.php');