<?php
	function alt($altinfo){
		echo "<script>alert($altinfo);</script>";
	}
	function con($conlog)
	{
		echo "<script>console.log('$conlog');</script>";
	}
	$mimeTypeArr=['image/jpeg','image/png','image/gif','image/webp','image/bmp','image/tiff','image/ico','image/svg+xml'];
	$imageFile =$_FILES['upload_file'];
	if($imageFile['size']>33554432){
		alt('图片过大!不能大于32MiB');
	}else{
		$mimeType=mime_content_type($imageFile['tmp_name']);
		if (in_array($mimeType,$mimeTypeArr)){
			$Base64 = base64_encode(file_get_contents($imageFile['tmp_name']));
			$imageBase64 = "data:{$mimeType};base64,{$Base64}";
		}else{
				alt('请输入正确格式的图片:JPEG,PNG,GIF,WEBP,BMP,TIFF,ICO,SVG');
				header('location:../Userset.php');
		}
	}
	$link = new mysqli('localhost', 'user', '123456', 'users');
	if ($link->connect_error){alt('服务器连接失败');exit();}
	else con('连接成功');
	$UserName = urldecode($_COOKIE['user']);
	$ID=mysqli_fetch_array(mysqli_query($link,"select UserID from users where UserName='$UserName'"))[0];
	mysqli_query($link,"update head set Head = '$imageBase64' where UserID=$ID");
	mysqli_close($link);
	header('location:../Userset.php');
?>