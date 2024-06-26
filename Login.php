<!DOCTYPE html>
<html>
<head xmlns="">
    <meta charset="UTF-8">
    <title>登陆</title>
    <link rel="icon" href="image/ico/Logo32.ico" type="image/x-icon" sizes="32x32">
    <link rel="icon" href="image/ico/Logo16.ico" type="image/x-icon" sizes="16x16">
    <link href="style/Login/login.css" type="text/css" rel="stylesheet">
    <link href="style/Login/wave.css" type="text/css" rel="stylesheet">
    <script src="script/funclib.js"></script>
    <style>
        #UserName{
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div id="logo">
        <a href="Index.html"><p>INFINITY</p></a>
    </div>
    <form action="#" method="POST">
    <div id="subject">
        <div class="input-box" id="UserName">
            <input type="text" required name="UserName" style="outline: none">
            <label>请输入用户名</label>
        </div>
        <script src="script/wave.js"></script>
        <div id="Password">
            <div class="input-password-box">
                <input id="passwordinput" type="password" required placeholder="请输入密码" name="Password">
            </div>
        </div>
        <div id="remember">
            <div id="DISPW">
                <input id="DISPWIN" type="checkbox" onclick="displayPassword()">
                <label id="DISPWLA">隐藏密码</label>
            </div>
            <script>
                function displayPassword(){
                    var flag = document.querySelector('#DISPWIN');
                    if(flag.checked){
                        document.getElementById('DISPWLA').innerHTML = '显示密码'.toString();
                        document.getElementById("passwordinput").type="text";
                    }else{
                        document.getElementById('DISPWLA').innerHTML = '隐藏密码'.toString();
                        document.getElementById("passwordinput").type="password";
                    }
                }
            </script>
            <div id="Wasure">
                <a href="#">忘记密码</a>
            </div>
	        <div id="Keep">
		        <input id="Keeplogin" type="checkbox" name="keepLogin">
		        <label>记住密码</label>
	        </div>
        </div>
        <div id="REG">
            <a href="Registered.php">注册</a>
        </div>
        <div id="Login">
            <input type="submit" value="登陆" name="submit">
        </div>
    </div>
    </form>
    <div style="display: none">
        <?php
	        include 'php/functionLib.php';
	
	        if (isset($_POST["submit"])) {
		        include 'php/connentSQL.php';
                $username = $_POST["UserName"];
                $password = $_POST["Password"];
				$Keep = $_POST['keepLogin'];

                $UserInfo=mysqli_fetch_array(mysqli_query($link,"select UserID,UserName,Hash from users where UserName like '$username';"));
                if($UserInfo[0]){
                    con('用户存在');
                    $signinHash = getHash($UserInfo[0],$password);//计算用户Hash
                    if($UserInfo[2]==$signinHash){//相符=密码正确
						if ($Keep){
							setcookie('user',$UserInfo[1],time()+60*60*24*30*12);
						}else{
							setcookie('user',$UserInfo[1]);
						}
                        alt('登录成功。点击跳转至主页');
                        $url = "Index.html";
                        echo "<meta http-equiv='refresh' content ='0;url=$url'>";
                    }else{
	                    alt('密码错误');
                    }
                }else{
                    alt('用户不存在');
                }
                mysqli_close($link);
			}
        ?>
</div>
</body>
</html>