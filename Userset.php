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
			            <img id="head" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/wAALCAGQAZABAREA/8QAHQABAAEFAQEBAAAAAAAAAAAAAAcBAgUGCAMECf/EAEQQAAEDBAEDAgQEAgcHAgYDAAEAAgMEBQYRBxIhMUFRCBMiYRQycYEVkQkWI0JSobEXJDNiwdHhNPAlQ3KCkqImU9L/2gAIAQEAAD8A/VNERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERULg0dzpUa8O3o70rkREREREREREREREREREREREREREREREVHO6Wk+dey0zLuW8ZxKiZLWXOHctSyijDH76p3HQj2PXa+nB35XJVXt+SNoGUrqrdsbRlxcIOkf8Tf97e1taIiIiIiIiIiIiIiIiIiIioewXk+rijc1r3hhcelvUQNu86HudL0a4uHdpb9j/4VyIiIiIiIqHsFjr/WR0tnqnP6gHM+X9J07buw19+655+G+x4FlcFRbrNRy3Knw+6TRfi61he2Std1OkkDzsPI30/Y+F0qxutk/wCqvREREREREREREREREREREVCNghRV8QvAFFz5jFBb5r7dMbudsqfxlvulpnMUsEvSW99eQQSCD6EqBrdzdy58K1bFbOY7Y/M8IDvlw5pZ4y6WBno6pjH+ZXV+FZ7YORMfpL3jd0p7vbKpgfFUUzw4a9j7H7FZ/ffSqiIiIiIqHwVyz8TvOt24yyq7sq7fN/U62Y5LcJaqMEfNqnPDImNcPXqIA/VTfw3x9aeNcDtdkstMaelZGZ39Tup8ksh+ZI9x9SXOPdbwqE6QHqCqiIiIiIiIiIiIvkr7nT2yB81Q8RxsBJJ9gN/z+yhii+Kq21tDV3I4zdKG0RXGCghrbk5lMKhskgjMzWvO+lpPcHufRTixwe0OaQWkbBHqqoiIiIi+KvtNNdqOopK+GKrpZ2lkkMrA5kjT6OB7FcsZL8NeVcCZDW5twJK1sUrzPdMAq5uiiuI8k07jsQygDt2IOz47KYuDfiDsXNlsqG09PU2PI7e75N0x+5sMdVRSjyC0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0cENNRvd0xU4aT1dP3J9VpbuTMYjzCvxaa909Jf6J2paCtBp3EEdi1z9B/8A9q2hvUW7LdH+YcPcFERERERERERAN+FpfH7avHPiuimZL0W6/wBhfHJHHFsPlhk7Oc/30V1Q3f69vKuREREREREREREVC0HyrRG0N6RsD7E7VwaASQPKqsHmuU0eEYtdb/cXdNDbqZ9TN38hoJ0PuT2/dRV8L+KV78bumfZFF/8AyPNagXKdshJdBTAapoe/jpj6dgepO+6m9g+gK5EVOkLTuReIMN5UtzqTKceoru3pIZLLHqaL7skbpzT92kFQ5htyx6toaujxdz32q1VkttHzHFzmvid0vHU4knv7lZ9ERERERERETQIIPg9ivW359aMArbZLdgdXOvhtkEgbssllLun9B9PoptjDgXBx36gD0C9ERERERERERERERFad77KFebLdJyrluPcdwvebR81t0v5idrdPGdxwn/63gbHsCpmpYY4adkcTAyJo0xo8AegXqBpVRERc/UnGtBxjV3Whtz3Ogr7lU3MtP9x0zupw/mF9aIiIiIiIiIi13NeLv9qtNaLcLkbVJb7rSXaOf0cYJQ7oP2cCR+66UjaQ4kn0AAXoiIiIiIiIiIiIiIrT2WJtuM0lsulwuEbQausLfmSEd+keB+3f+ayzPBVyIiKh8FQbfsygv+f5LaI6aSGSyyQwySP8S9cfWCP2ViIiIiIiIiIi0rmq11l44nyult9VV0Vb+BfNFNQOLZw6MiQdBHcE9Gu3uuhOM7+cpwHHbu+CamlraCGZ8VQCJGksGw4H12tnREREREREREREREVNJpVRERFQ/lPqufszyy0wc3XPGKW2ysucluhuFVWtH0PGy1oP7BfYiIiIiIiIiIr4ZPkysk8hpBP6eq3bjvluy53kWSY7SRzUd4x10LKujnZ0n5cjSY5G+7XBp1+i31EREREREREREREREREREVD4+ygS81+M5RyBdr3Y7hHW1dPGLTWGHuxj43E9G/Uja9kRERERERERFQgEHq3oedLG0OI24cn49mPzH0d0tjJaOSanOvxFM/uY5P8Al6gx36sC6BoqunrYGzU0rJ4XD6ZI3BwcPsQvoREREREREREREREREREReFTP0U07otSSMY4hoPkjfb+YXK3DuCf1CxSWmkh+TWVtfU3KrY53cSzyuf8A5Bb0iIiIiIiIiIi8aulbXU0lO8kRytLH9J0ekjR1+2z+yyPwhcdXDi/h2nsNyuTrpLFXVUkMz39ZbC6Qljd/YKa0RERERERERERERERERFR35T+ig/4nLtmdNbcPoMJmlo6i43+GGvrI2bEFG2OSWRx9t9IH/wBy8RvZLu5J2fuff/37qqIiIiIiIiIiK1423115OvYd1sHBV3uBkyK1Xe8Ulzq4KszQxU7Ol1PA8bYxw/RSuCDvR3rsVVERERERERERERERERERQpyJymIOWqbjeKlJJsBvk1U7X0/7y2GNo+51Jv8ARfIiIiIiIiIiKrWl7g1o2ShHS7R8+FRB2LSd6B2deVrmMYpNjXNdPmNDXNoaKtpTS3mBxJbUBo/snj2I77XSNvrIbjRxVVNI2anmYHxyN8PaRsEL6EREREREX//Z" style="height: 15%;width: 15%;-webkit-user-drag: none;">
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
                var jsonurl = '/json/UserInfo/'+getCookie('lang')+'-UserInfo.json';
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
                <span><a><input type="button" id="logoff" value="登出" onclick="setCookie('user','','365','/');location.reload();"></a></span>
                <span><a href="Money.html"><input type="button" id="okanekudasai" value="投喂"></a></span>
	            <script>
		            if(getCookie('user')=='') document.getElementById('loginbut').style.display = 'revert';
		            else document.getElementById('loginbut').style.display = 'none';
	            </script>
            </div>
        </form>
        <div style="display: none">
            <?php
	            include 'php/functionLib.php';
                function getInfo($sqllink,$UserName){
                    $UserInfo = mysqli_fetch_array(mysqli_query($sqllink,"select users.UserID,users.UserName,users.MakeTime,users.Sex,users.Resume,users.Email,users.Birthday,head.Head,users.TAG,users.STATE from users,head where UserName like '$UserName' and head.UserID = users.UserID;"));
                    echo "<script>
						document.getElementById('head').src = '$UserInfo[7]'
                        document.getElementById('id').innerHTML='$UserInfo[0]';
                        document.getElementById('maketime').innerHTML='$UserInfo[2]';
                        document.getElementById('state').value='$UserInfo[9]';
                        document.getElementById('tag').value='$UserInfo[8]';
                        document.getElementById('email').value = '$UserInfo[5]'.toString();
                        document.getElementById('resume').innerText = '$UserInfo[4]'.toString();
                        document.getElementById('birthday').value = '$UserInfo[6]';
                        document.getElementById('sex').value = '$UserInfo[3]';
						document.getElementById('resumelen').innerText = '('+(document.getElementById('resume').value.toString().length)+')'.toString()
                    </script>";
                    return $UserInfo;
                }
                if($_COOKIE['user']==""){
                    alt('未登录。请先登录');
                    $url="Login.php";
                    echo "<meta http-equiv='refresh' content ='0;url=$url'>";
                }
	            include 'php/connentSQL.php';
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
                        if(preg_match($PasswordRegular,$UserInfoUpload[UserPass])){//密码不符合规范
                            if((strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserPass])==0)or(strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserRePass])==0)){//新密码和旧密码相同
                                alt('新密码不能与旧密码相同');
								exit();
                            }else if(strcmp(getHash($UserInfo[UserID],$UserInfoUpload[UserOldPass]),mysqli_fetch_array(mysqli_query($link,"select Hash from users where users.userID = $UserInfo[UserID];"))[0])==0){
								alt('密码正确');
								$newhash = getHash($UserInfo[UserID],$UserInfoUpload[UserPass]);
								mysqli_query($link,"update users set Hash = '$newhash' where users.UserID = $UserInfo[UserID]");
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