<?php
	function getIP(){
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
			$ipaddress = getenv("HTTP_CLIENT_IP");
		} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
			$ipaddress = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
			$ipaddress = getenv("REMOTE_ADDR");
		} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		} else {
			$ipaddress = "unknown";
		}
		return $ipaddress;
	}//获取IP
	function ipToDecimal($ip) {
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			return 0000000000;
		}
		$parts = explode('.', $ip);
		$decimal = ($parts[0] << 24) + ($parts[1] << 16) + ($parts[2] << 8) + $parts[3];
		return $decimal;
	}//IP转整数
	function con($conlog)
	{
		echo "<script>console.log('$conlog');</script>";
	}
	function alt($altinfo){
		echo "<script>alert($altinfo);</script>";
	}
	if(isset($_POST['submit'])){
		$link=mysqli_connect('localhost','user','123456','users');
		if ($link->connect_error){alt('服务器连接失败');exit();}
		$commitText=$_POST['commit-text'];
		$UserName = urldecode($_COOKIE['user']);
		$IP=ipToDecimal(getIP());
		if($commitText==''){
			con('聊天信息不能为空');
		}else {
			$commitText = str_replace("你妈","我妈",$commitText);
			$commitLoad=mysqli_query($link,"insert into commit (UserID,Commit,IP) values ((select UserID from users where UserName = '$UserName'),'$commitText',$IP)");
		}
		header('location:../Index.html');
	}
?>