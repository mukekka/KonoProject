<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
    <link rel="icon" href="image/Logo32.ico" type="image/x-icon" sizes="32x32">
    <link rel="icon" href="image/Logo16.ico" type="image/x-icon" sizes="16x16">
    <link href="style/Index/global.css" rel="stylesheet" type="text/css">
    <link href="style/Index/header.css" rel="stylesheet" type="text/css">
    <link href="style/Index/subject.css" rel="stylesheet" type="text/css">
    <script src="script/jquery-3.2.1.min.js"></script>
    <script src="script/funclib.js"></script>
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
            transition: color 0.3s cubic-bezier(.645,.045,.355,1);
        }
        .inputtext:hover{
            border:gray solid 1px;
        }
        .inputtext:focus{
            border: #39C5BB solid 1px;
            color: #39C5BB;
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
    <script src="script/funclib.js"></script>
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
                    <td><input type="text" name="name" id="name" class="inputtext" title="最大长度为32字。更新此项需要密码" maxlength="32" oninput="this.value=this.value.replace(!/\ |\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/)"></td>
                    <script>
                        document.getElementById('name').placeholder = decodeURIComponent(getCookie('user')).toString();
                    </script>
                </tr><!--用户名-->
                <tr>
                    <td>性别:</td>
                    <td>
                        <select style="outline: none;appearance: none;width: 168px" class="inputtext" id="sex" name="sex">
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
                        <input maxlength="254" type="email" name="email" class="inputtext" id="email" title="最大长度为254字" placeholder="aminoac.6324@sxc.com">
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
                <tr>
                    <td>
                        用户密码:
                    </td>
                    <td>
                        <input id="oldpasswordinput" name="oldpasswordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="密码最小长度为4，最大长度为16" placeholder="请输入旧密码"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size: 12px;color: #4F4F4F" id="DISPWIN" type="checkbox" onclick="displayPassword()">
                        <label style="font-size: 12px;color: #4F4F4F" id="DISPWLA">隐藏密码</label>
                        <script>
                            function displayPassword(){
                                var flag = document.querySelector('#DISPWIN');
                                if(flag.checked){
                                    document.getElementById('DISPWLA').innerHTML = '显示密码'.toString();
                                    document.getElementById("passwordinput").type="text";
                                    document.getElementById("repasswordinput").type="text";
                                    document.getElementById("oldpasswordinput").type="text";
                                }else{
                                    document.getElementById('DISPWLA').innerHTML = '隐藏密码'.toString();
                                    document.getElementById("passwordinput").type="password";
                                    document.getElementById("repasswordinput").type="password";
                                    document.getElementById("oldpasswordinput").type="password";
                                }
                            }
                        </script>
                    </td>
                    <td>
                        <input id="passwordinput" name="passwordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="密码最小长度为4，最大长度为16" placeholder="请输入新密码"><br>
                        <input id="repasswordinput" name="repasswordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="密码最小长度为4，最大长度为16" placeholder="请再次输入新密码" style="padding-top: 1px">
                    </td>
                </tr><!--用户密码-->
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
                <tr>
                    <td><h id="sql"></td>
                </tr>
                <!--用户信息-->
            </table>
            <div id="button">
                <input type="submit" id="submit" name="submit" value="保存">
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
                function alt($altinfo){
                    echo "<script>alert($altinfo);</script>";
                }
                function getHash($ID,$Pass){
                    if($Pass!='') return hash('sha256',hash('sha256',$ID.$Pass).'INFINITY');//加密方式:ID+Name+Pass=Hash+salt=UserHash
                }
                if($_COOKIE['user']==""){
                    alt('未登录。请先登录');
                    $url="Login.php";
                    echo "<meta http-equiv='refresh' content ='0;url=$url'>";
                }
                $link = new mysqli('localhost', 'root', '123456', 'users');//连接到数据库
                if ($link->connect_error){con('连接失败');exit();}//die('连接失败:'.$link->connect_error);//连接失败
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
                        document.getElementById('sex').value = '$UserInfo[Sex]'
                    </script>";

                if (isset($_POST["submit"])) {
                $UserInfoUpload = array(
                    "UserName"=>$_POST['name'],
                    "UserSex"=>$_POST['sex'],
                    "UserBirthday"=>$_POST['birthday'],
                    "UserEmail"=>$_POST['email'],
                    "UserResume"=>$_POST['myresume'],
                    "UserOldPass"=>$_POST['oldpasswordinput'],
                    "UserPass"=>$_POST['passwordinput'],
                    "UserRePass"=>$_POST['repasswordinput'],
                    "UserHash"=>""
                );
                //$upload = mysqli_query($link,"update users set UserName = '$UserInfoUpload[UserName]',Sex = '$UserInfoUpload[UserSex]',Birthday = '$UserInfoUpload[UserBirthday]',Resume = '$UserInfoUpload[UserResume]',Email = '$UserInfoUpload[UserEmail]' where users.UserID = $UserInfo[UserID];");
                $upload = mysqli_query($link,"update users set Email = '$UserInfoUpload[UserEmail]' where users.UserID = '$UserInfo[UserID]';");

                if(($UserInfoUpload[UserPass]!=null)and($UserInfoUpload[UserRePass]!=null)){//新密码为空
                    if(strcmp($UserInfoUpload[UserPass],$UserInfoUpload[UserRePass])==0){//新密码不相同
                        if(preg_match("/^[a-zA-Z0-9_]{4,15}$/",$UserInfoUpload[UserPass])){//密码不符合规范
                            if((strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserPass])==0)or(strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserRePass])==0)){//新密码和旧密码相同
                                con('新密码不能与旧密码相同');
                            }else{//密码不正确
                                con('原密码不正确');
                            }
                        }else{
                            con('密码不符合规范!');
                        }
                    }else{
                        con('密码不相等!');
                    }
                }else{
                    con('无密码');
                }
            }mysqli_close($link);
            ?>
        </div>
    </div>
</body>
</html>