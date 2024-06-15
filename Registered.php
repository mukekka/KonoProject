<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>注册</title>
        <link rel="icon" href="image/ico/Logo32.ico" type="image/x-icon" sizes="32x32">
        <link rel="icon" href="image/ico/Logo16.ico" type="image/x-icon" sizes="16x16">
        <script src="script/funclib.js"></script>
        <link href="style/Login/login.css" type="text/css" rel="stylesheet">
        <link href="style/Login/wave.css" type="text/css" rel="stylesheet">
        <style>
            #subject{
                height: 300px;
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
            <input type="text" required onclick="" name="UserName" style="outline: none" maxlength="32" title="用户名最大长度为32字">
            <label>请输入用户名</label>
        </div>
        <script src="script/wave.js"></script>
        <div id="Password">
            <div class="input-password-box">
                <input id="passwordinput" type="password" required placeholder="请输入密码" name="Password" title="密码长度为5到16字">
            </div>
        </div>
        <div id="RePassword">
            <div class="input-password-box">
                <input id="repasswordinput" type="password" required placeholder="请再次输入密码" name="rePassword" title="密码长度为5到16字">
            </div>
        </div>
        <div id="remember">
            <div id="DISPW">
                <input id="DISPWIN" type="checkbox" onclick="displayPassword()">
                <label id="DISPWLA">隐藏密码</label>
            </div>
        </div>
        <script>
            function displayPassword(){
                var flag = document.querySelector('#DISPWIN');
                if(flag.checked){
                    document.getElementById('DISPWLA').innerHTML = '显示密码'.toString();
                    document.getElementById("passwordinput").type="text";
                    document.getElementById("repasswordinput").type="text";
                }else{
                    document.getElementById('DISPWLA').innerHTML = '隐藏密码'.toString();
                    document.getElementById("passwordinput").type="password";
                    document.getElementById("repasswordinput").type="password";
                }
            }
        </script>
        <div id="Login">
            <input type="submit" value="注册" name="submit">
        </div>
    </form>
    <div style="display: none">
        <?php
	        include 'php/functionLib.php';
			
            if(isset($_POST["submit"])){
	            include 'php/connentSQL.php';
                $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
                //信息获取
                $Password = $_POST['Password'];//用户输入密码
                $rePassword = $_POST['rePassword'];//用户再次输入密码
                $UserName = $_POST['UserName'];//用户输入名称
                $UserInfo = array("UserID"=>$getNewID,"UserName"=>"","UserPass"=>"","UserHash"=>"");

        function PasswordText($Pass1,$Pass2){
            if($Pass1==''||$Pass2==''){
                alt('密码有为空');
                exit();
            }elseif($Pass1==''&&$Pass2==''){
                alt('无输入密码');
                exit();
            }else{
                if(strcmp($Pass1,$Pass2)==0){//密码相同
                    if(preg_match("/^[a-zA-Z0-9_]{4,15}$/",$Pass1)){//密码允许英文字母和阿拉伯数字，长度为5-16
                        return $Pass1;
                    }else{
                        alt('密码不符合规范,只允许英文字母和阿拉伯数字，长度为5-16');
                        exit();
                    }
                }elseif (strcmp($Pass1,$Pass2)!=0){
                    alt('密码不相同');
                    exit();
                }
            }
        }
        function UserNameText($textUserName,$sqllink){
            $textReName = mysqli_num_rows(mysqli_query($sqllink,"select UserName from users where UserName like '$textUserName'"));//查询是否重名
            if($textUserName){
                if($textReName){//重名
                    alt('重名');
                    exit();
                }else{//名称未被使用
                    con('用户名未使用');
                    if (preg_match($UserNameRegular,$textUserName)){
                        alt('用户名不符合规范，不允许有下划线以外的特殊字符。长度为32个字');
                    }else{
                        return $textUserName;
                    }
                }
            }else{
                alt('无用户名');
                exit();
            }
        }

            $UserInfo['UserName'] = UserNameText($UserName,$link);
            $UserInfo['UserPass'] = PasswordText($Password,$rePassword);
            $UserInfo['UserHash'] = getHash($getNewID,$UserInfo['UserPass']);
			
            $regToSqlVal1 = $UserInfo['UserName'];
            $regToSqlVal2 = $UserInfo['UserHash'];
            $regToSql = "INSERT INTO users (UserName,Hash) VALUES ('$regToSqlVal1','$regToSqlVal2')";
			$regHeadToSql = "INSERT INTO head (Head) VALUES ('$DeafHead')";
            con("用户ID:".$UserInfo['UserID'].",用户名:".$UserInfo['UserName'].",用户密码:".$UserInfo['UserPass'].",用户Hash:".$UserInfo['UserHash']);
            $inSql =  mysqli_query($link,$regToSql);//写入数据
            $inSql =  mysqli_query($link,$regHeadToSql);//写入头像
            con($inSql);
            alt('点击跳转至登录');
            $url = "Login.php";
            echo "<meta http-equiv='refresh' content ='0;url=$url'>";
            mysqli_close($link);//结束连接
        }
    ?>
    </div>
    </body>
</html>
<!--博麗霊夢,博麗神社のみこ-->