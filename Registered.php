<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>注册</title>
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
            <input type="text" required onclick="" name="UserName">
            <label>请输入用户名</label>
        </div>
        <script src="script/wave.js"></script>
        <div id="Password">
            <div class="input-password-box">
                <input id="passwordinput" type="password" required placeholder="请输入密码" name="Password">
            </div>
        </div>
        <div id="RePassword">
            <div class="input-password-box">
                <input id="repasswordinput" type="password" required placeholder="请再次输入密码" name="rePassword">
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
                        document.getElementById("repasswordinput").type="text";
                    }else{
                        document.getElementById('DISPWLA').innerHTML = '隐藏密码';
                        document.getElementById("passwordinput").type="password";
                        document.getElementById("repasswordinput").type="password";
                    }
                }
            </script>
        </div>
        <div id="Login">
            <input type="submit" value="注册" name="submit">
<!--            onclick="passwordtest()">
            <script>
                function passwordtest(){
                    var pw1,pw2;
                    pw1 = document.getElementById('passwordinput').value;
                    pw2 = document.getElementById('repasswordinput').value;
                    // if(pw1==""||pw2==""){
                    //     console.log("null");
                    // }else
                    if(pw1!==pw2){
                        console.log("no");
                    }else{
                        console.log("yes");
                    }
                }
            </script>-->
            <?php if(!isset($_POST["submit"])){ ?>
        </div>
    </div>
    </form>
    <?php
        }else{
        function con($conlog){
            echo "<script>console.log('$conlog');</script>";
        }//控制台输出
        function getHash($ID,$Name,$Pass){
            return hash('sha256',hash('sha256',$ID.$Name.$Pass).'INFINITY');
            //加密方式:ID+Name+Pass=Hash+salt=UserHash
        }//获取用户哈希

//        数据库连接
        $link = new mysqli('localhost','root','123456','users');//连接到数据库
        if($link->connect_error)die('连接失败:'.$link->connect_error);//连接失败
        else con('连接成功');//连接成功
//        信息获取
        $Password = $_POST['Password'];//用户输入密码
        $rePassword = $_POST['rePassword'];//用户再次输入密码
        $UserName = $_POST['UserName'];//用户输入名称
        $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
        $textReName = mysqli_fetch_array(mysqli_query($link,"select UserName from users where UserName like '$UserName'"))[0];//查询是否重名

        $UserInfo = array("UserID"=>$getNewID,"UserName"=>"","Password"=>"","UserHash"=>"");

        function PasswordText($Pass1,$Pass2){
            if($Pass1==""||$Pass2==""){
                con('密码有为空');
            }elseif($Pass1==""&&$Pass2==""){
                con('无输入密码,使用默认密码:123456');
                $Pass1= '123456';
                return $Pass1;
            }
            else{
                if(strcmp($Pass1,$Pass2)==0){//密码相同
                    con('有密码:'.$Pass1);
                    return $Pass1;
                }elseif (strcmp($Pass1,$Pass2)!=0){
                    con('密码不相同');
                }
            }
        }


        if($UserName){
            con('有用户名:'.$UserName);
            if($textReName){//重名
                con('重名,使用用户名+新ID');
                $getNewName = $UserName.'_'.($getNewID);//用户输入名称和新ID组成名称
            }else{//名称未被使用
                con('用户名未使用:');
                $getNewName = $UserName;
            }
        }else{
            con('无用户名,使用默认用户名:注册用户+新ID');
            $UserName = '注册用户_'.$getNewID;
        }
        $UserHash = hash('sha256',hash('sha256',$getNewID.$getNewName.$Password).'INFINITY');//用户ID+用户名+用户密码=Hash+盐=用户Hash
        con("用户ID:".$getNewID.",用户名:".$getNewName.",用户密码:".$Password.",用户Hash:".$UserHash);

//    $inSql =  mysqli_query($link,"INSERT INTO users (UserName,Sex,Resume,Hash,TAG) VALUES ('$getNewName','女','博麗神社のみこ','$UserHash','会员')");//写入数据

        mysqli_close($link);//结束连接
        }
    ?>
    </body>
</html>