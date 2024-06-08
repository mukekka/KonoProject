<?php
	echo $_FILES['upload_file']['name'];
	switch ($_FILES['upload_file']['type']){
		case 'image/jpeg':
			$tojpgfilename = $targetFile = $_FILES['upload_file']["name"]; // 获取上传文件的路径
			$tojpg = 'jpg';
			break;
		case 'image/png':
			$tojpgfilename = $targetFile = $_FILES['upload_file']["name"]; // 获取上传文件的路径
			$tojpg = 'png';
			break;
		default:
			echo "不支持的文件格式,仅支持jpg、png";
			exit();
	}
	$tempDir = "../tmp/";//网站临时文件夹
	if (move_uploaded_file($_FILES['upload_file']["tmp_name"], $tempDir.$targetFile)) {//从本地上传到网站文件夹
		echo "文件已成功上传.";
	} else {
		echo "上传文件失败.";
	}
	$link = new mysqli('localhost', 'root', '123456', 'users');
	$UserName = urldecode($_COOKIE['user']);
	$ID=mysqli_fetch_array(mysqli_query($link,"select UserID from users where UserName='$UserName'"))[0];
	switch ($tojpg){
		case 'jpg':
			$src = $tempDir.$targetFile;
			rename($src,$tempDir.$ID.'.jpg');
			break;
		case 'png':
			$src = $tempDir.$targetFile;
			$png = imagecreatefrompng($src);
			$upload_file = imagejpeg($png,$tempDir.$ID.'.jpg');
			unlink($src);
			if ($upload_file) {
				echo "转换成功！";
			} else {
				echo "转换失败！";
			}
			break;
	}
	$targetDir = "../head/"; //指定文件夹的路径
	rename($tempDir.$ID.'.jpg',$targetDir.$ID.'.jpg');
	mysqli_query($link,"update users set Head = UserID where UserName='$UserName'");
	mysqli_close($link);
	header('location:../Userset.php');
?>