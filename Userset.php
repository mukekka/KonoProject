<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
    <link rel="icon" href="image/ico/Logo32.ico" type="image/x-icon" sizes="32x32">
    <link rel="icon" href="image/ico/Logo16.ico" type="image/x-icon" sizes="16x16">
    <link href="style/Index/global.css" rel="stylesheet" type="text/css">
    <link href="style/Index/header.css" rel="stylesheet" type="text/css">
    <link href="style/Index/subject.css" rel="stylesheet" type="text/css">
	<link href="style/User/user.css" rel="stylesheet" type="text/css">
    <script src="script/jquery-3.2.1.min.js"></script>
    <script src="script/funclib.js"></script>
</head>
<body>
    <div class="header">
            <div id="logo" style="margin-left: 40%;">
                <a href="Index.html">
                    <p style="font-family: TL">INFINITY</p>
                </a>
            </div>
            <h id="logosub">用户信息</h>
        </div>
    <div id="subject">
            <table>
	            <tr>
		            <td id="UserHead-td">头像:</td>
		            <td>
			            <img id="head" src="head/0.jpg" style="height: 15%;width: 15%;-webkit-user-drag: none;">
			            <form action="./php/headload.php" method="post" enctype="multipart/form-data">
				            <input id="loadUpImage" type="file" name="upload_file">
				            <input id="loadUpImageSubmit" type="submit">
			            </form>
		            </td>
	            </tr>
	            <form action="#" method="post">
                <tr>
                    <td id="UserName-td">用户名:</td>
                    <td><input type="text" name="name" id="name" class="inputtext" title="MAX:32" maxlength="32" oninput="this.value=this.value.replace(!/\ |\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/)"></td>
                    <script>
                        document.getElementById('name').value = decodeURIComponent(getCookie('user')).toString();
                    </script>
                </tr><!--用户名-->
                <tr>
                    <td id="UserSex-td">性别:</td>
                    <td>
                        <select style="outline: none;appearance: none;" class="inputtext" id="sex" name="sex">
                            <option id="UserSex-op1" value="无">无</option>
                            <option id="UserSex-op2" value="男">男</option>
                            <option id="UserSex-op3" value="女">女</option>
                            <option id="UserSex-op4" value="武装直升机">武装直升机</option>
                            <option id="UserSex-op5" value="沃尔玛购物袋">沃尔玛购物袋</option>
                            <option id="UserSex-op6" value="秀吉">秀吉</option>
                        </select>
                    </td>
                </tr><!--性别-->
                <tr>
                    <td id="UserBirthday-td">生日:</td>
                    <td>
                        <input type="date" name="birthday" id="birthday" class="inputtext">
                    </td>
                </tr><!--生日-->
                <tr>
                    <td id="UserEmail-td">邮箱:</td>
                    <td>
                        <input maxlength="64" type="email" name="email" class="inputtext" id="email" title="MAX:64" placeholder="aminoac.6324@sxc.com">
                    </td>
                </tr><!--邮箱-->
                <tr>
                    <td id="UserResume-td">
                        个人简介:
                    </td>
                    <td rowspan="2">
                        <textarea onkeyup="onkey()" maxlength="128" id="resume" name="myresume" style="width:400px;height:60px;font-family: 宋体;font-size: 12px;resize: none" class="inputtext" title="MAX:128"></textarea>
                    </td>
                    <script>
                        function onkey(){
                            document.getElementById('resumelen').innerText = '('+(document.getElementById('resume').value.toString().length)+')'.toString();
                        }
                    </script>
                </tr><!--简介-->
	            <tr>
		            <td>
			            <label style="font-size: 12px;color: #4F4F4F" id="resumelen">(0)</label>
		            </td>
	            </tr>
                <tr>
                    <td id="UserPass-td">
                        用户密码:
                    </td>
                    <td>
                        <input id="oldpasswordinput" name="oldpasswordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="MAX:16,MIN:4" placeholder="请输入旧密码"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="font-size: 12px;color: #4F4F4F" id="DISPWIN" type="checkbox" onclick="displayPassword()"><br>
                        <label style="font-size: 12px;color: #4F4F4F" id="DISPWLA">(っωc)</label>
                        <script>
                            function displayPassword(){
                                var flag = document.querySelector('#DISPWIN');
                                if(flag.checked){
                                    document.getElementById('DISPWLA').innerHTML = 'c(⊙▽⊙)っ'.toString();
                                    document.getElementById("passwordinput").type="text";
                                    document.getElementById("repasswordinput").type="text";
                                    document.getElementById("oldpasswordinput").type="text";
                                }else{
                                    document.getElementById('DISPWLA').innerHTML = "(っωc)".toString();
                                    document.getElementById("passwordinput").type="password";
                                    document.getElementById("repasswordinput").type="password";
                                    document.getElementById("oldpasswordinput").type="password";
                                }
                            }
                        </script>
                    </td>
                    <td>
                        <input id="passwordinput" name="passwordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="MAX:16,MIN:4" placeholder="请输入新密码"><br>
                        <input id="repasswordinput" name="repasswordinput" type="password" maxlength="16" minlength="4" class="inputtext" title="MAX:16,MIN:4" placeholder="请再次输入新密码" style="padding-top: 1px">
                    </td>
                </tr><!--用户密码-->
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td id="UserID-td">用户ID:</td>
                    <td><h id="id"></h></td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td id="UserMakeTime-td">创建时间:</td>
                    <td><h id="maketime"></h></td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F">
                    <td id="UserState-td">账号状态:</td>
                    <td>
	                    <select name="state" id="state" disabled="disabled" style="outline: none;appearance: none;color: black;border: none">
		                    <option id="state-1" value="注销">注销</option>
		                    <option id="state-2" value="封禁">封禁</option>
		                    <option id="state-3" value="正常">正常</option>
	                    </select>
                    </td>
                </tr>
                <tr style="font-size: 12px;color: #4F4F4F" >
                    <td>
	                    <select name="tag" id="tag" disabled="disabled" style="outline: none;appearance: none;color: black;border: none">
		                    <option id="tag-1" value="成员">成员</option>
		                    <option id="tag-2" value="会员">会员</option>
		                    <option id="tag-3" value="站长">站长</option>
	                    </select>
                    </td>
                </tr>
                <!--用户信息-->
            </table>
            <script>
                var jsonurl = 'json/UserInfo/'+getCookie('lang')+'-UserInfo.json';
                $.getJSON(jsonurl,function (data){
                    for (var i = 0; i < Object.keys(data['lang']).length; i++) {
                        var lable = data['lang'][i]['type'];
                        var content = data['lang'][i]['content'];
                        var lableid = data['lang'][i]['id'];
                        switch (lable){
                            case 'lang':
                                document.documentElement.lang = content;
                                break;
                            case 'title':
                                document.title = content;
                                break;
                            case 'innHTML':
                                document.getElementById(lableid).innerHTML = content;
                                break;
                            case 'placeholder':
                                document.getElementById(lableid).placeholder = content;
                                break;
                            case 'value':
                                document.getElementById(lableid).value = content;
                                break;
                        }
                    }
                });
            </script>
            <div id="button" class="button">
                <input type="submit" id="submit" name="submit" value="保存">
                <a href="Index.html"><input type="button" id="back" value="退出"></a>
                <span id="loginbut"><a href="Login.php"><input type="button" id="signin" value="登录"></a></span>
                <span><a><input type="button" id="logoff" value="登出" onclick="setCookie('user','','365','/');setCookie('hash','','365','/');location.reload();"></a></span>
                <span><a href="Money.html"><input type="button" id="okanekudasai" value="投喂"></a></span>
	            <script>
		            if(getCookie('user')=='') document.getElementById('loginbut').style.display = 'revert';
		            else document.getElementById('loginbut').style.display = 'none';
	            </script>
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
                function getInfo($sqllink,$UserName){
                    $UserInfo = mysqli_fetch_array(mysqli_query($sqllink,"select UserID,UserName,MakeTime,Sex,Resume,Email,Birthday,Head,TAG,STATE from users where UserName like '$UserName';"));
                    echo "<script>
						document.getElementById('head').src = 'head/$UserInfo[Head].jpg'
                        document.getElementById('id').innerHTML='$UserInfo[UserID]';
                        document.getElementById('maketime').innerHTML='$UserInfo[MakeTime]';
                        document.getElementById('state').value='$UserInfo[STATE]';
                        document.getElementById('tag').value='$UserInfo[TAG]';
                        document.getElementById('email').value = '$UserInfo[Email]'.toString();
                        document.getElementById('resume').innerText = '$UserInfo[Resume]'.toString();
                        document.getElementById('birthday').value = '$UserInfo[Birthday]';
                        document.getElementById('sex').value = '$UserInfo[Sex]';
						document.getElementById('resumelen').innerText = '('+(document.getElementById('resume').value.toString().length)+')'.toString()
                    </script>";
                    return $UserInfo;
                }
                if($_COOKIE['user']==""){
                    alt('未登录。请先登录');
                    $url="Login.php";
                    echo "<meta http-equiv='refresh' content ='0;url=$url'>";
                }
                $link = new mysqli('localhost', 'user', '123456', 'users');//连接到数据库
                if ($link->connect_error){alt('服务器连接失败');exit();}//die('连接失败:'.$link->connect_error);//连接失败
                else con('连接成功');//连接成功
                $UserName = urldecode($_COOKIE['user']);

                $UserInfo = getInfo($link,$UserName);

                if (isset($_POST["submit"])) {
                $UserInfoUpload = array(
                    "UserName"=>$_POST['name'],
                    "UserSex"=>$_POST['sex'],
                    "UserBirthday"=>$_POST['birthday'],
                    "UserEmail"=>$_POST['email'],
                    "UserResume"=>$_POST['myresume'],
                    "UserOldPass"=>$_POST['oldpasswordinput'],
                    "UserPass"=>$_POST['passwordinput'],
                    "UserRePass"=>$_POST['repasswordinput']
                );
                $upload = mysqli_query($link,"update users set UserName = '$UserInfoUpload[UserName]',Sex = '$UserInfoUpload[UserSex]',Birthday = '$UserInfoUpload[UserBirthday]',Resume = '$UserInfoUpload[UserResume]',Email = '$UserInfoUpload[UserEmail]' where users.UserID = $UserInfo[UserID];");
                echo "<script>setCookie('user','$UserInfoUpload[UserName]','365','/')</script>";

                if(($UserInfoUpload[UserPass]!=null)and($UserInfoUpload[UserRePass]!=null)){//新密码为空
                    if(strcmp($UserInfoUpload[UserPass],$UserInfoUpload[UserRePass])==0){//新密码不相同
                        if(preg_match("/^[a-zA-Z0-9_]{4,15}$/",$UserInfoUpload[UserPass])){//密码不符合规范
                            if((strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserPass])==0)or(strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserRePass])==0)){//新密码和旧密码相同
                                alt('新密码不能与旧密码相同');
								exit();
                            }else if(strcmp(getHash($UserInfo[UserID],$UserInfoUpload[UserOldPass]),mysqli_fetch_array(mysqli_query($link,"select Hash from users where users.userID = $UserInfo[UserID];"))[0])==0){
								alt('密码正确');
								$newhash = getHash($UserInfo[UserID],$UserInfoUpload[UserPass]);
								mysqli_query($link,"update users set Hash = '$newhash' where users.UserID = $UserInfo[UserID]");
								echo "<script>setCookie('hash','$newhash','365','/');</script>";
                            }else{//密码不正确
                                alt('原密码不正确');
								exit();
                            }
                        }else{
                            alt('密码不符合规范!');
							exit();
                        }
                    }else{
                        alt('密码不相等!');
						exit();
                    }
                }else{
                    alt('无密码');
                }
                echo "<meta http-equiv='refresh' content ='0;url="."'>";
            }
			mysqli_close($link);
            ?>
        </div>
    </div>
</body>
</html>