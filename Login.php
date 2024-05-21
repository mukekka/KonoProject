<!DOCTYPE html>
<html>
<head xmlns="">
    <meta charset="UTF-8">
    <title>登陆</title>
    <link rel="icon" href="image/Logo32.ico" type="image/x-icon" sizes="32x32">
    <link rel="icon" href="image/Logo16.ico" type="image/x-icon" sizes="16x16">
    <link href="style/Login/login.css" type="text/css" rel="stylesheet">
    <link href="style/Login/wave.css" type="text/css" rel="stylesheet">
    <script src="script/funclib.js"></script>
    <script src="script/userset.js"></script>
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
            if (isset($_POST["submit"])) {
            function con($conlog){
                echo "<script>console.log('$conlog');</script>";
            }
            function alt($altinfo){
                echo "<script>alert('$altinfo');</script>";
            }
            function getHash($ID,$Name,$Pass){
                if(($Name!='')&&($Pass!='')){
                    return hash('sha256',hash('sha256',$ID.$Name.$Pass).'INFINITY');
                }
                //加密方式:ID+Name+Pass=Hash+salt=UserHash
            }//获取用户哈希

            $username = $_POST["UserName"];
            $password = $_POST["Password"];
//            echo implode(",",$_POST["rempass"]);

            $link = new mysqli('localhost','root','123456','users');//连接到数据库
            if($link->connect_error)con('连接失败');//die('连接失败:'.$link->connect_error);//连接失败
            else con('连接成功');//连接成功

            $UserInfo=mysqli_fetch_array(mysqli_query($link,"select UserID,UserName,Hash from users where UserName like '$username';"));
            if($UserInfo[0]){
                con('用户存在');
                $signinHash = getHash($UserInfo[0],$username,$password);//计算用户Hash
                if($UserInfo[2]==$signinHash){//相符=密码正确
                    alt('密码正确');
                    setcookie('user',$UserInfo[1],time()+60*60*24*30*12);
                    setcookie('hash',$UserInfo[2],time()+60*60*24*30*12);
                    alt('点击跳转至主页');
                    $url = "http://www.infinity.com";
                    echo "<meta http-equiv='refresh' content ='0;url=$url'>";
                }else{
                    alt('密码错误');
                }
            }else{
                alt('用户不存在');
            }

//            con('用户ID:'.$UserInfo[0]);
//            con('用户名:'.$username);
//            con('用户密码:'.$password);
            mysqli_close($link);
            }
        ?>
</div>
</body>
</html>