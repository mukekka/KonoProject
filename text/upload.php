<?php
	$targetDir = "upload/"; // 指定文件夹的路径
	$targetFile = $targetDir . basename($_FILES["image"]["name"]); // 获取上传文件的路径
// 检查文件类型
	$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	if($imageFileType != "jpg") {
		echo "只允许上传 JPG";
		exit;
	}
// 将文件移动到指定文件夹
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
		echo "文件已成功上传.";
	} else {
		echo "上传文件失败.";
	}
	echo "<script>history.back(-1)</script>"
?>