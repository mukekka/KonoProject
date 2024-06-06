<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/commit.css" rel="stylesheet" type="text/css">
    <link href="../style/scrollbar.css" rel="stylesheet" type="text/css">
</head>
<body class="scrollbar">
    <?php
        function con($conlog)
        {
            echo "<script>console.log('$conlog');</script>";
        }

        $link = mysqli_connect('localhost','root','123456','users');
        $commitRow = mysqli_query($link,"select count(Num) from commit");
        $commitRowLen =  mysqli_fetch_array($commitRow)[0];//消息行数
        for($i=1;$i<=$commitRowLen;$i++){
            mysqli_fetch_array(mysqli_query($link,"select UserID,Commit,Time from commit order by Num limit $i"));
        }
    ?>
    <div id="page-side1" class="scrollbar">
        <table>
            <tr>
                <td class="Commit-Head" rowspan="2">
	                <image class="Head" src="../head/1.jpg">
                </td>
	            <td class="Commit-UserName" colspan="2"><marquee>Koizumi</marquee></td>
            </tr>
	        <tr>
		        <td class="Commit-Tag">
			        <select disabled="disabled" id="Commit-select">
				        <option value="成员">成员</option>
				        <option value="会员">会员</option>
				        <option value="站长">站长</option>
			        </select>
		        </td>
		        <td class="Commit-Time">2024/12/12</td>
	        </tr>
	        <tr>
		        <td class="Commit-Content" colspan="3">好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好</td>
	        </tr>
        </table>
	    <hr>
    </div>
</body>
</html>
