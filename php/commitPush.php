<?php
	function con($conlog)
	{
		echo "<script>console.log('$conlog');</script>";
	}
	if(isset($_POST['submit'])){
		$link=mysqli_connect('localhost','user','123456','users');
		$commitText=$_POST['commit-text'];
		$UserName = urldecode($_COOKIE['user']);
		if($commitText==''){
			con('聊天信息不能为空');
		}else {
			$commitLoad=mysqli_query($link,"insert into commit (UserID,Commit) values ((select UserID from users where UserName = '$UserName'),'$commitText')");
		}
		header('location:../Index.html');
	}
?>