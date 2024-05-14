<!DOCTYPE html>
<html>
<head xmlns="">
    <meta charset="UTF-8">
    <title>登陆</title>
    <link href="style/Login/login.css" type="text/css" rel="stylesheet">
    <link href="style/Login/wave.css" type="text/css" rel="stylesheet">
    <style>
        #UserName{
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div id="logo">
        <p>INFINITY</p>
    </div>
    <form action="#" method="POST">
    <div id="subject">
        <div class="input-box" id="UserName">
            <input type="text" required name="UserName">
            <label>请输入用户名</label>
        </div>
        <script src="script/wave.js"></script>
        <div id="Password">
            <div class="input-password-box">
                <input id="passwordinput" type="password" required placeholder="请输入密码" name="Password">
            </div>
        </div>
        <div id="remember">
            <div id="PW">
                <input type="checkbox">
                <label>记住密码</label>
            </div>
            <div id="DISPW">
                <input id="DISPWIN" type="checkbox" onclick="displayPassword()">
                <label id="DISPWLA">隐藏密码</label>
            </div>
            <script>
                function displayPassword(){
                    var flag = document.querySelector('#DISPWIN');
                    if(flag.checked){
                        document.getElementById('DISPWLA').innerHTML = '显示密码';
                        document.getElementById("passwordinput").type="text";
                    }else{
                        document.getElementById('DISPWLA').innerHTML = '隐藏密码';
                        document.getElementById("passwordinput").type="password";
                    }
                }
            </script>
            <div id="Wasure">
                <a href="#">忘记密码</a>
            </div>
        </div>
        <div id="REG">
            <a href="Registered.php">注册</a>
        </div>
        <div id="Login">
            <input type="submit" value="登陆" name="submit">
            <?php if(!isset($_POST["submit"])){ ?>
        </div>
    </div>
    </form>
        <?php
            }else{
            function con($conlog){
                echo "<script>console.log('$conlog');</script>";
            }

            $username = $_POST["UserName"];
            $password = $_POST["Password"];

            $link = new mysqli('localhost','root','123456','users');//连接到数据库
            if($link->connect_error)con('连接失败');//die('连接失败:'.$link->connect_error);//连接失败
            else con('连接成功');//连接成功

            $UserInfo=mysqli_fetch_array(mysqli_query($link,"select UserID,UserName,Hash from users where UserName like '$username';"));
            if($UserInfo[0]){
                con('用户存在');
                $signinHash = hash('sha256',hash('sha256',$UserInfo[0].$username.$password).'INFINITY');//计算用户Hash
                if($UserInfo[2]==$signinHash){//相符=密码正确
                    con('密码正确');
                }else{
                    con('密码错误');
                }
            }else{
                con('用户不存在');
            }

            con('用户ID:'.$UserInfo[0]);
            con('用户名:'.$username);
            con('用户密码:'.$password);
            con('用户Hash:'.$UserInfo[2]);
            con('运算Hash:'.$signinHash);

            mysqli_close($link);
        }
        ?>
</body>
</html>