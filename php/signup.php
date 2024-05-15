<?php
    function con($conlog){
    echo "<script>console.log('$conlog');</script>";
}//控制台输出
    //        数据库连接
    $link = new mysqli('localhost','root','123456','users');//连接到数据库
    if($link->connect_error)die('连接失败:'.$link->connect_error);//连接失败
    else con('连接成功');//连接成功

    $getNewID = mysqli_fetch_array(mysqli_query($link,'select max(UserID)+1 from users'))[0];//获取新ID
    function getHash($ID,$Name,$Pass){
    if(($Name!='')&&($Pass!='')){
        return hash('sha256',hash('sha256',$ID.$Name.$Pass).'INFINITY');
    }
    //加密方式:ID+Name+Pass=Hash+salt=UserHash
}//获取用户哈希
    //信息获取
    $Password = $_POST['Password'];//用户输入密码
    $rePassword = $_POST['rePassword'];//用户再次输入密码
    $UserName = $_POST['UserName'];//用户输入名称
    $UserInfo = array("UserID"=>$getNewID,"UserName"=>"","UserPass"=>"","UserHash"=>"");

    function PasswordText($Pass1,$Pass2){
    if($Pass1==''||$Pass2==''){
        con('密码有为空');
    }elseif($Pass1==''&&$Pass2==''){
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
            exit();
        }
    }
}
    function UserNameText($textUserName,$sqllink){
    $textReName = mysqli_fetch_array(mysqli_query($sqllink,"select UserName from users where UserName like '$textUserName'"))[0];//查询是否重名
    $getNewID = mysqli_fetch_array(mysqli_query($sqllink,'select max(UserID)+1 from users'))[0];//获取新ID
    if($textUserName){
        con('有用户名:'.$textUserName);
        if($textReName){//重名
            con('重名,使用用户名+新ID');
            return $textUserName.'_'.$getNewID;
        }else{//名称未被使用
            con('用户名未使用');
            return $textUserName;
        }
    }else{
        con('无用户名,使用默认用户名:注册用户+新ID');
        return '注册用户_'.$getNewID;
    }
}

    $UserInfo['UserName'] = UserNameText($UserName,$link);
    $UserInfo['UserPass'] = PasswordText($Password,$rePassword);
    $UserInfo['UserHash'] = getHash($getNewID,$UserInfo['UserName'],$UserInfo['UserPass']);
    con("用户ID:".$UserInfo['UserID'].",用户名:".$UserInfo['UserName'].",用户密码:".$UserInfo['UserPass'].",用户Hash:".$UserInfo['UserHash']);

    //    $inSql =  mysqli_query($link,"INSERT INTO users (UserName,Sex,Resume,Hash,TAG) VALUES ('$getNewName','女','博麗神社のみこ','$UserHash','会员')");//写入数据

    mysqli_close($link);//结束连接
?>