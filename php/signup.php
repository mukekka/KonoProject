<?php
    function con($conlog){
        echo "<script>console.log('$conlog');</script>";
    }
    $link = new mysqli('localhost','root','123456','users');//连接到数据库
    if($link->connect_error)die('连接失败:'.$link->connect_error);//连接失败
    else echo '连接成功<br>';//连接成功

    $Password = $_POST['Password'];//用户输入密码
    $UserName = $_POST['UserName'];//用户输入名称

//$Password = 'HakureiReimu';
//$UserName = '博麗霊夢';

    if($Password){
        con('有密码');
    }else{
        con('无密码,使用默认密码:123456');
        $Password = '123456';
    }

    $textReName = mysqli_fetch_array(mysqli_query($link,"select UserName from users where UserName like '$UserName'"))[0];//查询是否重名
    $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
    if($UserName){
        con('有用户名');
        if($textReName){//重名
            con('重名,使用用户名+新ID');
            $getNewName = $UserName.'_'.($getNewID);//用户输入名称和新ID组成名称
        }else{//名称未被使用
            con('未使用');
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
?>