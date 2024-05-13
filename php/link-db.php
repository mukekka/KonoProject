<?php
    $link = new mysqli('localhost','root','123456','users');//连接到数据库
    if($link->connect_error)die('连接失败:'.$link->connect_error);//连接失败
    else echo '连接成功<br>';//连接成功

    $pass = "HakureiReimu";//用户输入密码
    $UserName = "博麗霊夢";//用户输入名称

    $textReName = mysqli_fetch_array(mysqli_query($link,"select UserName from users where UserName like '$UserName'"))[0];//查询是否重名
    $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
    if($textReName){//重名
        echo "重名<br>";
        $getNewName = $UserName.'_'.($getNewID);//用户输入名称和新ID组成名称
    }else{//名称未被使用
        echo "未使用<br>";
        $getNewName = $UserName;
    }
    $UserHash = hash('sha256',$getNewID.$getNewName.$pass);//用户ID+用户名+用户密码=用户哈希

    echo "用户ID:".$getNewID."<br>用户名:".$getNewName."<br>用户密码:".$pass."<br>用户哈希:".$UserHash;

//    $inSql =  mysqli_query($link,"INSERT INTO users (UserName,Sex,Resume,Hash,TAG) VALUES ('$getNewName','女','博麗神社のみこ','$UserHash','会员')");//写入数据

    $pass=null;//销毁内存用户信息
    $UserName=null;
    $textReName = null;
    $getNewID = null;
    $getNewName = null;
    mysqli_close($link);//结束连接
?>