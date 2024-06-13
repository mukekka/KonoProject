<?php
	include 'functionLib.php';
	include 'connentSQL.php';
	
	if(isset($_POST['submit'])){
		$commitText=$_POST['commit-text'];
		$UserName = urldecode($_COOKIE['user']);
		$IP=ipToDecimal(getIP());
		if($commitText==''){
			con('聊天信息不能为空');
		}else {
			$commitText = str_replace("你妈","我妈",$commitText);
			$commitLoad=mysqli_query($link,"insert into commit (UserID,Commit,IP) values ((select UserID from users where UserName = '$UserName'),'$commitText',$IP)");
		}
		header('location:/Index.html');
	}
?>