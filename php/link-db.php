<?php
    $link = new mysqli('localhost','root','123456','users');//连接到数据库
    if($link->connect_error)die('连接失败:'.$link->connect_error);//连接失败
    else echo '连接成功<br>';//连接成功

    $pass = "123456";//用户输入密码
    $UserName = "璟1";//用户输入名称

    $textReName = mysqli_fetch_array(mysqli_query($link,"select UserName from users where UserName like '$UserName'"))[0];//查询是否重名
    if($textReName){//重名
        echo "重名<br>";
        echo $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
        echo "<br>";
        echo $getNewName = $UserName.'-'.($getNewID);//用户输入名称和新ID组成名称
        echo "<br>";
    }else{//名称未被使用
        echo "未使用<br>";
    }

    echo $UserHash = hash('sha256',$getNewID.$getNewName.$pass);//用户ID+用户名+用户密码=用户哈希

    $pass=null;//销毁内存用户信息
    $UserName=null;
    $textReName = null;
    $getNewName = null;
    mysqli_close($link);//结束连接
?>