<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="/style/commit.css" rel="stylesheet" type="text/css">
    <link href="/style/scrollbar.css" rel="stylesheet" type="text/css">
</head>
<body class="scrollbar">
    <?php
	    include '../php/functionLib.php';
		include '../php/connentSQL.php';
		$json = jsonToArr('../json/memes.json');
    ?>
    <div id="page-side1" class="scrollbar">
	    <?php
		    $selectSQL = "
		    SELECT
				commit.Num AS Num,
   				commit.UserID AS UserID,
   				commit.Commit AS Commit,
   				commit.Time AS Time,
   				commit.IP AS IP,
   				head.Head AS Head,
   				users.UserName AS UserName,
   				users.MakeTime AS MakeTime,
   				users.Sex AS Sex,
   				users.Resume AS Resume,
   				users.Email AS Email,
		    	users.Birthday AS Birthday,
		    	users.TAG AS TAG,
		    	users.STATE AS STATE
			FROM
				users,commit,head
			/*LEFT JOIN head ON commit.UserID = head.UserID */
			WHERE
				head.UserID = commit.UserID
				AND
				users.UserID = commit.UserID
			ORDER BY commit.Num DESC
		    ";
		    $result = mysqli_query($link,$selectSQL);
		    foreach ($result as $row){
			    $commitContent = $row['Commit'];
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
			    $IP = intToIp($row['IP']);
			    if (md5($_COOKIE['user'])=='192892d5fdddb97640bb9158f6a9e460') echo "<table title='$IP'>";
			    else echo "<table>";
			    echo "<tr>
                            <td class='Commit-Head' rowspan='2'>
	                            <image class='Head' src='{$row['Head']}' title='用户ID:{$row['UserID']}\n简介:{$row['Resume']}\n邮箱:{$row['Email']}\n性别:{$row['Sex']}\n生日:{$row['Birthday']}\n账号状态:{$row['STATE']}\n入驻时间:{$row['MakeTime']}'>
                            </td>
	                        <td class='Commit-UserName' colspan='2'><p>{$row['UserName']}</p></td>
	                        <td class='Commit-Tag'>{$row['TAG']}</td>
	                    </tr>
	                    <tr>
	                        <td class='Commit-Floor'>{$row['Num']}</td>
		                    <td class='Commit-Time' colspan='3'>{$row['Time']}</td>";
			    if($row['UserName']==urldecode($_COOKIE['user'])) echo "<td><form method='post' action='../php/commitDelete.php?num={$row['Num']}'><input class='delete' type='submit' value='删除'></form></td>";
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
