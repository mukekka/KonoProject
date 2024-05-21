<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="icon" href="image/Logo32.ico" type="image/x-icon" sizes="32x32">
    <link rel="icon" href="image/Logo16.ico" type="image/x-icon" sizes="16x16">
    <script src="script/funclib.js"></script>
    <link href="style/Index/global.css" rel="stylesheet" type="text/css">
    <link href="style/Index/header.css" rel="stylesheet" type="text/css">
    <link href="style/Index/subject.css" rel="stylesheet" type="text/css">
    <style>
        .header h{
            display: block;
            margin-top: 10px;
        }
        #subject{
            top: 35px;
            padding-top: 10px;
            height: 500px;
            box-shadow: 0 1px 5px grey;
        }
        #subject div{
            margin: 10px auto auto 5px;
        }
        .text{
            border-left: none;
            border-right: none;
            border-top: none;
            outline: none;
            color: ;
        }
        #button{
            padding-bottom: 0;
        }
        #button input{
            border-radius: 5px;
            background-color: #39C5BB;
            font-family: SS;
            font-size: 15px;
            color: white;
            width: 100px;
            height: 25px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="header">
            <div id="logo">
                <a href="Index.html">
                    <p>INFINITY</p>
                </a>
            </div>
            <h>用户信息</h>
        </div>
    <div id="subject">
        <form action="#" method="post">
            <div>
                <label>用户名:</label>
                <input type="text" name="name" id="name" class="text">
                <script>
                    document.getElementById('name').placeholder = decodeURIComponent(getCookie('user')).toString();
                </script>
            </div>
            <div id="Sex">
                <label>性别:</label>
                <input type="radio" checked="checked" value=null name="mysex"/>无
                <input type="radio" value="男" name="mysex"/>男
                <input type="radio" value="女" name="mysex"/>女
                <input type="radio" value="武装直升机" name="mysex"/>武装直升机
                <input type="radio" value="沃尔玛购物袋" name="mysex"/>沃尔玛购物袋
                <input type="radio" value="秀吉" name="mysex"/>秀吉
            </div>
            <div>
                <label>生日:</label>
                <input type="date" name="birthday" id="birthday">
            </div>
            <div>
                <label>邮箱:</label>
                <input type="email" name="email" class="text" id="email">
            </div>
            <div>
                <label>个人简介:</label><br>
                <textarea id="resume" name="myresume" style="width:25%;height:100px;font-family: 宋体;font-size: 2px"></textarea>
            </div>
            <div style="font-size: 5px;color: #4F4F4F">
                <h>用户ID:</h><h id="id"></h><br>
                <h>创建时间:</h><h id="maketime"></h><br>
                <h>账号状态:</h><h id="state"></h><br>
                <h id="tag"></h>
            </div>
            <div id="button">
                <input type="submit" id="submit" value="保存">
                <input type="button" id="reset" value="重置默认">
                <a href="Index.html"><input type="button" id="back" value="退出"></a>
            </div>
        </form>
        <div style="display: none">
            <?php
                function con($conlog)
                    {
                        echo "<script>console.log('$conlog');</script>";
                    }
                $link = new mysqli('localhost', 'root', '123456', 'users');//连接到数据库
                if ($link->connect_error) con('连接失败');//die('连接失败:'.$link->connect_error);//连接失败
                else con('连接成功');//连接成功

                $UserName = urldecode($_COOKIE['user']);
                $UserInfo=mysqli_fetch_array(mysqli_query($link,"select UserID,UserName,MakeTime,Sex,Resume,Email,Birthday,Head,TAG,STATE from users where UserName like '$UserName';"));
                echo "<script>
                    document.getElementById('id').innerHTML='$UserInfo[UserID]';
                    document.getElementById('maketime').innerHTML='$UserInfo[MakeTime]';
                    document.getElementById('state').innerHTML='$UserInfo[STATE]';
                    document.getElementById('tag').innerHTML='$UserInfo[TAG]';
                    document.getElementById('email').placeholder = '$UserInfo[Email]'.toString();
                    document.getElementById('resume').innerText = '$UserInfo[Resume]'.toString();
                    document.getElementById('birthday').value = '$UserInfo[Birthday]';
                </script>";
                if (isset($_POST["submit"])) {

                }
            ?>
        </div>
    </div>
</body>
</html>