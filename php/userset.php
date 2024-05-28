<?php
    function con($conlog){
        echo "<script>console.log('$conlog');</script>";
    }
    function alt($altinfo){
        echo "<script>alert($altinfo);</script>";
    }
    function getHash($ID,$Name,$Pass){
        if(($Name!='')&&($Pass!='')){
            return hash('sha256',hash('sha256',$ID.$Name.$Pass).'INFINITY');
        }
        //加密方式:ID+Name+Pass=Hash+salt=UserHash
    }//获取用户哈希
    $link = new mysqli('localhost', 'root', '123456', 'users');//连接到数据库
    if ($link->connect_error) con('连接失败');//die('连接失败:'.$link->connect_error);//连接失败
    else con('连接成功');//连接成功

    if (isset($_POST["submit"])) {
        $UserInfoUpload = array(
            "UserName"=>$_POST['name'],
            "UserSex"=>$_POST['sex'],
            "UserBirthday"=>$_POST['birthday'],
            "UserEmail"=>$_POST['email'],
            "UserResume"=>$_POST['myresume'],
            "UserPass"=>$_POST['passwordinput'],
            "UserRePass"=>$_POST['repasswordinput'],
            "UserOldPass"=>$_POST['oldpasswordinput'],
            "UserHash"=>""
        );
        con($UserInfoUpload[UserEmail]);
        if($UserInfoUpload[UserEmail]==''){
            $UserInfoUpload[UserEmail]=$UserInfo[Email];
        }
        if(($UserInfoUpload[UserPass]!=null)and($UserInfoUpload[UserRePass]!=null)){//新密码不为空
            if(strcmp($UserInfoUpload[UserPass],$UserInfoUpload[UserRePass])==0){//新密码相同
                if(preg_match("/^[a-zA-Z0-9_]{4,15}$/",$UserInfoUpload[UserPass])){//密码符合规范
                      if((strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserPass])==0)or(strcmp($UserInfoUpload[UserOldPass],$UserInfoUpload[UserRePass])==0)){//新密码和旧密码相同
                          con('新密码不能与旧密码相同');
                          exit();
                      }elseif(strcmp(getHash($UserInfo[UserID],$_COOKIE['user'],$UserInfoUpload[UserOldPass]),$_COOKIE['hash'])==0){//新旧密码不相同
                          if($UserInfoUpload[UserName]!=''){//不更改用户名
                              $UserInfoUpload[UserHash] = getHash($UserInfo[UserID],$UserInfoUpload[UserName],$UserInfoUpload[UserPass]);
                          }else{
                              $UserInfoUpload[UserName] = $UserInfo[UserName];//更改用户名
                              $UserInfoUpload[UserHash] = getHash($UserInfo[UserID],$_COOKIE['user'],$UserInfoUpload[UserPass]);
                          }
                          con('已修改');
                      }else{//密码不正确
                          con('原密码不正确');
                          exit();
                      }
                }else{
                    con('密码不符合规范!');
                    exit();
                }
            }else{
                con('密码不相等!');
                exit();
            }
        }else{
            con('无密码');
            exit();
        }
        $sqlUpLoad="UPDATE users 
                    SET UserName = '$UserInfoUpload[UserName]',
                        Sex = '$UserInfoUpload[UserSex]',
                        Birthday = '$UserInfoUpload[UserBirthday]',
                        Resume = '$UserInfoUpload[UserResume]',
                        Email = '$UserInfoUpload[UserEmail]',
                        Hash = '$UserInfoUpload[UserHash]'
                    WHERE users.UserID = $UserInfo[UserID];";
        //$sqlupdate = mysqli_query($link,$sqlUpLoad);
        setcookie('user',$UserInfoUpload[UserName],time()+60*60*24*30*12);
        setcookie('hash',$UserInfoUpload[UserHash],time()+60*60*24*30*12);
    //                    $upload = "UPDATE users SET UserName = 'Koizumi2', Resume = '是站长呢(·ω·)2', Head = '12' WHERE users.UserID = 1";
    }
    mysqli_close($link);
?>