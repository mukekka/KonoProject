<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/commit.css" rel="stylesheet" type="text/css">
    <link href="../style/scrollbar.css" rel="stylesheet" type="text/css">
</head>
<body class="scrollbar">
    <?php
	    function intToIp($int) {
		    $parts = array(
				    ($int >> 24) & 0xFF,
				    ($int >> 16) & 0xFF,
				    ($int >> 8) & 0xFF,
				    $int & 0xFF
		    );
		    return implode('.', $parts);
	    }
        function con($conlog){
            echo "<script>console.log('$conlog');</script>";
        }
	    function alt($altinfo){
		    echo "<script>alert($altinfo);</script>";
	    }
        $link = mysqli_connect('localhost','user','123456','users');
	    if ($link->connect_error){alt('服务器连接失败');exit();}
	    else con('连接成功');
        $commitRow = mysqli_query($link,"select max(Num) from commit");
        $commitRowLen =  mysqli_fetch_array($commitRow)[0];//消息行数
	    $json = json_decode(file_get_contents('../json/memes.json'),true);
    ?>
    <div id="page-side1" class="scrollbar">
	    <?php
		    for($i=$commitRowLen;$i>=1;$i--){
			    $commitItem =  mysqli_fetch_row(mysqli_query($link,"SELECT commit.Num,users.UserName,users.Head,users.TAG,commit.Commit,commit.Time,users.Sex,users.Resume,users.STATE,users.Email,users.UserID,users.MakeTime,users.Birthday,commit.IP FROM users,commit WHERE commit.Num = $i and users.UserID = commit.UserID"));
			    $commitContent = $commitItem[4];
                if ($commitContent=='') continue;
				$memesjson = $json;
                $matches = [];$uniqueMatches = [];
                if (preg_match_all('/\[([^\]]*)\]/i', $commitContent, $matches)) {
                    $fullCaptures = $matches[0];
                    foreach ($fullCaptures as $fullCapture) {
                        $uniqueMatches[] = $fullCapture;
                    }
                    $uniqueMatches = array_intersect($memesjson,array_unique($uniqueMatches));
                    foreach ($memesjson as $key => $value){
                        $commitContent = str_replace($value,"<img class='Commit-Meme' src='../memes/b_".$key.".png'>",$commitContent);
                    }
                }
				$IP = intToIp($commitItem[13]);
			    echo "<table title='$IP'>
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
		                    <td class='Commit-Content' colspan='4'>$commitContent</td>
	                    </tr>
                    </table>
	                <hr>";
		    }
	    ?>
    </div>
</body>
</html>
