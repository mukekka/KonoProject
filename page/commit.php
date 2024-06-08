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
        $link = mysqli_connect('localhost','user','123456','users');
        $commitRow = mysqli_query($link,"select max(Num) from commit");
        $commitRowLen =  mysqli_fetch_array($commitRow)[0];//消息行数
    ?>
    <div id="page-side1" class="scrollbar">
	    <?php
		    for($i=$commitRowLen;$i>=1;$i--){
			    $commitItem =  mysqli_fetch_row(mysqli_query($link,"SELECT commit.Num,users.UserName,users.Head,users.TAG,commit.Commit,commit.Time,users.Sex,users.Resume,users.STATE,users.Email,users.UserID,users.MakeTime,users.Birthday FROM users,commit WHERE commit.Num = $i and users.UserID = commit.UserID"));
			    if ($commitItem[4]=='') continue;
			    echo "<table>
                        <tr>
                            <td class='Commit-Head' rowspan='2'>
	                            <image class='Head' src='../head/$commitItem[2].jpg' title='用户ID:$commitItem[10]\n简介:$commitItem[7]\n邮箱:$commitItem[9]\n性别:$commitItem[6]\n生日:$commitItem[12]\n账号状态:$commitItem[8]\n入驻时间:$commitItem[11]'>
                            </td>
	                        <td class='Commit-UserName' colspan='2'><p>$commitItem[1]</p></td>
	                        <td class='Commit-Tag'>$commitItem[3]</td>
	                    </tr>
	                    <tr>
	                        <td class='Commit-Floor'>$commitItem[0]</td>
		                    <td class='Commit-Time' colspan='3'>$commitItem[5]</td>";
				if($commitItem[1]==urldecode($_COOKIE['user'])) echo "<td><form method='post' action='../php/commitDelete.php?num={$commitItem[0]}'><input class='delete' type='submit' value='删除'></form></td>";
				echo "</tr>
	                    <tr>
		                    <td class='Commit-Content' colspan='4'>$commitItem[4]</td>
	                    </tr>
                    </table>
	                <hr>";
		    }
	    ?>
    </div>
</body>
</html>
