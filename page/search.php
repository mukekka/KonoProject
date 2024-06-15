<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>INFINITY</title>
	<link rel="icon" href="/image/ico/Logo32.ico" type="image/x-icon" sizes="32x32">
	<link rel="icon" href="/image/ico/Logo16.ico" type="image/x-icon" sizes="16x16">
	<link href="/style/Index/global.css" rel="stylesheet" type="text/css"><!-- 全局设置 -->
	<link href="/style/Index/header.css" rel="stylesheet" type="text/css"><!-- 导航栏 -->
	<link href="/style/scrollbar.css" rel="stylesheet" type="text/css"><!--滑动条-->
	<link href="/style/Index/search-bar.css" rel="stylesheet" type="text/css"><!--搜索框-->
	<style>
		body{
			overflow-y: scroll;
		}
		#logoContent{
			margin: auto 50%;
		}
		.container{
			margin-left: 30%;
			z-index: 999;
		}
		#subject{
			height: auto;
			margin: 0;
			position: relative;
			display: block;
		}
		#main{
			padding-top: 0.5%;
			width: 90%;
			/*height: 670px;*/
			float: left;
		}
		#page-main{
			padding-left: 1%;
			width: 1050px;
			text-align: center;
			float: left;
			margin: 45px auto auto 10px;
			box-shadow: 0 1px 5px grey;
			border-radius: 5px;
		}
	</style>
</head>
<body class="scrollbar">
	<div class="header">
		<div id="logo">
			<a href="/Index.html">
				<p id="logoContent">INFINITY</p>
			</a>
		</div>
	</div>
	<div class="container">
		<form action="search.php" class="parent" method="post">
			<input type="text" placeholder="热搜" id="hotsearch" name="search">
			<input type="submit" value="搜索" id="search" name="submit"><!--onclick="showNotification('系统消息','这个还没做')">-->
		</form>
	</div>
	<?php
		$searchInfo = $_POST['search'];
		include "../php/functionLib.php";
		$page = jsonToArr("../json/SecondaryPages.json");
		echo "<script>document.getElementById('hotsearch').value = '$searchInfo'</script>";
	?>
	<div id="subject">
		<div id="main">
			<div id="page-main">
				<?php
					$searchInfo = str_replace(' ', '', $searchInfo);
					if (empty($searchInfo)) return false;
					$filteredArray = array_filter($page, function($value, $key) use ($searchInfo) {
						return strpos($key, $searchInfo) !== false;
					}, ARRAY_FILTER_USE_BOTH);
					if (empty($filteredArray)) {
						echo "无结果";
					} else {
						echo "<h2>搜到以下结果</h2>";
						foreach ($filteredArray as $key => $value) {
							echo "<a href='$value'>$key</a><br>";
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>