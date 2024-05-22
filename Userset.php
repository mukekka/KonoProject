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
        *{
            font-family: SS;
        }
        .header h{
            display: block;
            margin-top: 10px;
        }
        td:first-child{
            text-align: right;
            padding-right: 10px;
            margin-top: 0px;
        }
        #subject{
            border-radius: 5px;
            margin:25px auto;
            padding: 20px;
            top: 35px;
            height: auto;
            width: 550px;
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
            <div id="logo" style="margin-left: 40%;">
                <a href="Index.html">
                    <p style="font-family: TL">INFINITY</p>
                </a>
            </div>
            <h>用户信息</h>
        </div>
    <div id="subject">
        <form action="#" method="post">
            <table>
                <tr>
                    <td>用户名:</td>
                    <td><input type="text" name="name" id="name" class="inputtext" title="最大长度为32字" maxlength="32" oninput="this.value=this.value.replace(!/\ |\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/)"></td>
                    <script>
                        document.getElementById('name').placeholder = decodeURIComponent(getCookie('user')).toString();
                    </script>
                </tr><!--用户名-->
                <tr>
                    <td>性别:</td>
                    <td>
                        <select style="outline: none;appearance: none;width: 168px" class="inputtext" id="sex">
                            <option>无</option>
                            <option>男</option>
                            <option>女</option>
                            <option>武装直升机</option>
                            <option>沃尔玛购物袋</option>
                            <option>秀吉</option>
                        </select>
                    </td>
                </tr><!--性别-->
                <tr>
                    <td>生日:</td>
                    <td>
                        <input type="date" name="birthday" id="birthday" class="inputtext">
                    </td>
                </tr><!--生日-->
                <tr>
                    <td>邮箱:</td>
                    <td>
                        <input maxlength="254" type="email" name="email" class="inputtext" id="email" title="最大长度为254字" oninput="this.value=this.value.replace(/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/)">
                    </td>
                </tr><!--邮箱-->
                <tr>
                    <td>
                        个人简介:<br>
                        <label style="font-size: 12px;color: #4F4F4F" id="resumelen"></label>
                    </td>
                    <td>
                        <textarea onkeyup="onkey()" maxlength="128" id="resume" name="myresume" style="width:400px;height:60px;font-family: 宋体;font-size: 12px;resize: none" class="inputtext" title="最大长度为128字"></textarea>
                    </td>
                    <script>
                        function onkey(){
                            document.getElementById('resumelen').innerText = '(共'+(document.getElementById('resume').value.toString().length)+'字)'.toString();
                        }
                    </script>
                </tr><!--简介-->
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td>用户ID:</td>
                    <td><h id="id"></h></td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td>创建时间:</td>
                    <td><h id="maketime"></h></td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td>账号状态:</td>
                    <td><h id="state"></h></td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F" >
                    <td><h id="tag"></td>
                </tr>
                <!--用户信息-->
            </table>
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
                con($UserInfo[Sex]);
                echo "<script>
                    document.getElementById('id').innerHTML='$UserInfo[UserID]';
                    document.getElementById('maketime').innerHTML='$UserInfo[MakeTime]';
                    document.getElementById('state').innerHTML='$UserInfo[STATE]';
                    document.getElementById('tag').innerHTML='$UserInfo[TAG]';
                    document.getElementById('email').placeholder = '$UserInfo[Email]'.toString();
                    document.getElementById('resume').innerText = '$UserInfo[Resume]'.toString();
                    document.getElementById('birthday').value = '$UserInfo[Birthday]';
                    document.getElementById('sex').value = '$UserInfo[Sex]';
                </script>";
                if (isset($_POST["submit"])) {

                }
            ?>
        </div>
    </div>
</body>
</html>