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
			    $commitItem =  mysqli_fetch_array(mysqli_query($link,"select Num,UserID,Commit,Time from commit where Num = $i"));
				$commitItemInfo = mysqli_fetch_array(mysqli_query($link,"select UserName,Head,Tag from users where UserID = $commitItem[UserID]"));
//			    if ($commitItem['Num']=='') continue;
			    echo "<table>
                        <tr>
                            <td class='Commit-Head' rowspan='2'>
	                            <image class='Head' src='../head/$commitItemInfo[Head].jpg'>
                            </td>
	                        <td class='Commit-UserName' colspan='2'><marquee>$commitItemInfo[UserName]</marquee></td>
                        </tr>
	                    <tr>
		                    <td class='Commit-Tag'>$commitItemInfo[Tag]</td>
		                    <td class='Commit-Time'>$commitItem[Time]</td>
	                    </tr>
	                    <tr>
		                    <td class='Commit-Content' colspan='3'>$commitItem[Commit]</td>
	                    </tr>
                    </table>
	                <hr>";
		    }
	    ?>
    </div>
</body>
</html>
