<?php
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
?>