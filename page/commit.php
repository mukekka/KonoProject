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
    ?>
    <div id="page-side1" class="scrollbar">
	    <?php
		    for($i=1;$i<=$commitRowLen;$i++){
			    $commitItem =  mysqli_fetch_row(mysqli_query($link,"SELECT Commit.Num,users.UserName as UserName,users.Head as Head,users.TAG as Tag,commit.Commit as Commit,commit.Time as Time FROM users,commit WHERE commit.Num = $i and users.UserID = commit.UserID"));
			    if ($commitItem[0]=='') continue;
			    echo "<table>
                        <tr>
                            <td class='Commit-Head' rowspan='2'>
	                            <image class='Head' src='../head/$commitItem[2].jpg'>
                            </td>
	                        <td class='Commit-UserName' colspan='3'><marquee>$commitItem[1]</marquee></td>
                        </tr>
	                    <tr>
	                        <td class='Commit-Floor'>$commitItem[0]</td>
		                    <td class='Commit-Tag'>$commitItem[3]</td>
		                    <td class='Commit-Time'>$commitItem[5]</td>
	                    </tr>
	                    <tr>
		                    <td class='Commit-Content' colspan='3'>$commitItem[4]</td>
	                    </tr>
                    </table>
	                <hr>";
		    }
	    ?>
    </div>
</body>
</html>
