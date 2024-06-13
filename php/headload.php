<?php
	include 'functionLib.php';
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
				header('location:/Userset.php');
		}
	}
	include 'connentSQL.php';
	$UserName = urldecode($_COOKIE['user']);
	$ID=mysqli_fetch_array(mysqli_query($link,"select UserID from users where UserName='$UserName'"))[0];
	mysqli_query($link,"update head set Head = '$imageBase64' where UserID=$ID");
	mysqli_close($link);
	header('location:/Userset.php');
?>