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
            border-radius: 5px;
            margin:25px auto;
            padding: 20px;
            top: 35px;
            height: auto;
            width: 500px;
            box-shadow: 0 2px 4px rgba(0,0,0,.14);
        }
        #subject div{
            margin: 10px auto auto 5px;
        }
        .inputtext{
            border-radius: 3px;
            padding: 2px;
            border: #a8a8a8 solid 1px;
            outline: none;
            transition: border-color 0.3s cubic-bezier(.645,.045,.355,1);
        }
        .inputtext:hover{
            border:gray solid 1px;
        }
        .inputtext:focus{
            border: #66CCFF solid 1px;
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
        @keyframes bordercolor {
            from{
                border: #4F4F4F solid 1px;
            }
            to{
                border: #66CCFF solid 1px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
            <div id="logo" style="margin-left: 40%">
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
                <input type="text" name="name" id="name" class="inputtext">
                <script>
                    document.getElementById('name').placeholder = decodeURIComponent(getCookie('user')).toString();
                </script>
            </div>
            <div id="Sex">
                <label>性别:</label>
                <select style="outline: none;" class="inputtext">
                    <option>无</option>
                    <option>男</option>
                    <option>女</option>
                    <option>武装直升机</option>
                    <option>沃尔玛购物袋</option>
                    <option>秀吉</option>
                </select>
            </div>
            <div>
                <label>生日:</label>
                <input type="date" name="birthday" id="birthday" class="inputtext">
            </div>
            <div>
                <label>邮箱:</label>
                <input type="email" name="email" class="inputtext" id="email" >
            </div>
            <div>
                <label>个人简介:</label><br>
                <textarea maxlength="127" id="resume" name="myresume" style="width:50%;height:100px;font-family: 宋体;font-size: 12px;" class="inputtext"></textarea>
            </div>
            <div style="font-size: 12px;color: #4F4F4F">
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