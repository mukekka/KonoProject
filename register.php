<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        #button input{
            width: 26.4%;
            border: 2px solid black;
            border-radius: 3px;
            background-color: #48AA9D;
            color: #FFF;
        }
        .one{
            text-align: right;
        }
        td{
            color: blue;
            border:1px solid gray;
            border-width:0px 1px 1px 0px;
        }
    </style>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","root","reg");
if(!$conn){
    die("连接失败");
}
mysqli_query($conn,"set names utf8");

?>

<?php if (!isset($_POST["sumbit"])) { ?>
<form action="#" method="post">
    <f>
        <div style="width:740px;">
            <p style="color:#00AED1;width:100%;font-size:25px;text-align:center;font-weight:bolder;">会员注册系统</p>
            <div style="border:2px solid black;width:100%;height:450px;">
                <span style="display:block;width:70px;height:20px;left:30px;position:relative;top:-15px;text-align:center;background-color:white;color:red;">会员注册</span>
                <div style="padding-left:2.5%;display:block;">
                    <table style="border-spacing:1px;border:1px solid gray;border-width:1px 0px 0px 1px;">
                        <tr class="input">
                            <td class="one">用户名</td>
                            <td>
                                <input name="username" type="text" pattern="^[\u4E00-\u9FA5A-Za-z0-9_]+{4,15}$" maxlength="16" minlength="5"><label style="color:red;">*</label>(以字母开头，允许5-16字节，允许字母数字下划线)
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">密码</td>
                            <td>
                                <input name="pwd" type="password" pattern="^[a-zA-Z][a-zA-Z0-9_]{4,15}$" maxlength="18" minlength="6"><label style="color:red;">*</label>(以字母开头，允许6-18字节，只能包含字母、数字和下划线)
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">确认密码</td>
                            <td>
                                <input name="conpwd" type="password" pattern="^[a-zA-Z][a-zA-Z0-9_]{4,15}" maxlength="18" minlength="6"><label style="color:red;">*</label>(以字母开头，允许6-18字节，只能包含字母、数字和下划线)
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">电话号码</td>
                            <td>
                                <input name="mytelnum" type="tel" pattern="^[1]\d{10}$" maxlength="11">(以1开头，11位数字)
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="td_2" align="left">性别</td>
                            <td>
                                <input type="radio" checked="checked" value="男" name="mysex"/>男
                                <input type="radio" value="女" name="mysex"/>女
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">邮箱</td>
                            <td>
                                <input type="email" name="myemail" pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">(包含@和.的邮箱)
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">爱好</td>
                            <td>
                                <input name="fav[]" type="checkbox" value="听音乐">听音乐
                                <input name="fav[]" type="checkbox" value="玩游戏">玩游戏
                                <input name="fav[]" type="checkbox" value="踢足球">踢足球
                                <input name="fav[]" type="checkbox" value="打羽毛球">打羽毛球
                                <input name="fav[]" type="checkbox" value="打篮球">打篮球
                                <input name="fav[]" type="checkbox" value="唱歌">唱歌
                                <input name="fav[]" type="checkbox" value="跳舞">跳舞
                                <input name="fav[]" type="checkbox" value="看电影">看电影
                                <input name="fav[]" type="checkbox" value="看小说">看小说
                            </td>
                        </tr>
                        <tr class="input">
                            <td class="one">个人简介</td>
                            <td height="200px" style="padding-top: 5px">
                                <textarea class="resume" name="myresume" style="width:98.5%;height:98%"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id="button" style="text-align:center;">
                                <input type="submit" name="sumbit" value="注册">
                                <input type="reset" name="reset" value="重置">
                                <input type="button" name="exit" value="返回主页" onclick="history.back()">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</form>
<?php
}else{
    $username=trim($_POST['username']);
    $pwd=trim($_POST['pwd']);
    $cpw=trim($_POST['conpwd']);
    $mytelnum=$_POST['mytelnum'];
    $mysex=$_POST['mysex'];
    $myemail=$_POST['myemail'];
    $fav=@implode(",",$_POST['fav']);
    $myresume=$_POST['myresume'];

    //判断用户名是否重复（是否被占用）
    $sql="select * from info where username='$username'";
    $result=mysqli_query($conn,$sql);   //返回一个记录集
    $num=mysqli_num_rows($result);      //返回行数

    if($num){           //行数不为0
        echo"<script>alert('此用户名已经被占用了，请返回重新输入');history.back();</script>";
        exit;
    }

    if($pwd!=$cpw){
        echo"<script>alert('密码设置不一致，请返回重新输入');history.back();</script>";
        exit;
    }


    $sql="insert into info(username,password,telphone,gender,email,hobby,resume)
    values ('$username','$pwd','$mytelnum','$mysex','$myemail','$fav','$myresume')";

    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('数据插入成功');</script>";
    }else{
        echo "<script>alert('数据插入失败');history.back()</script>";
    }


        printf("<h1>您提交的个人信息</h1>");
        printf("<form form style='border 0'>");
        printf("<fieldset style='width: 760px'>");
        printf("<legend class='red'>会员注册</legend>");
        printf("<table align='center' class='info' border='1' style='border-collapse:collapse'>");
        printf("<tr><td align='right'>用户名</td><td align='left' class='td_2'>%s</td></tr>", $_POST["username"]);
        printf("<tr><td align='right'>登录密码</td><td align='left' class='td_2'>%s</td></tr>", $_POST["pwd"]);
        printf("<tr><td align='right'>电话号码</td><td align='left' class='td_2'>%s</td></tr>", $_POST["mytelnum"]);
        printf("<tr><td align='right'>性别</td><td align='left' class='td_2'>%s</td></tr>", $_POST["mysex"]);
        printf("<tr><td align='right'>邮箱</td><td align='left' class='td_2'>%s</td></tr>", $_POST["myemail"]);
        printf("<tr><td align='right'>爱好</td><td align='left' class='td_2'>%s</td></tr>", implode(",",$_POST["fav"]));
        printf("<tr><td align='right'>个人简介</td><td valign='top' align='left' class='td_2' height='200'>%s</td></tr>", $_POST["myresume"]);
        printf("</table>");
        printf("</<fieldset>");
        printf("</form>");
        printf("<p style='text-align: center'><input type='button' class='btn01' value='返回' onclick='history.back();'></p>");
    }
    ?>
    </body>
</html>
