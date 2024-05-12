<?php
    $link = new mysqli('localhost','user','123456','users');
    if($link->connect_error)die('连接失败:'.$link->connect_error);
    else echo '连接成功<br>';

    $UserName = "Koizumi";
    echo $getuser = mysqli_query($link,"select users from users where UserName=$UserName");

    mysqli_close($link);
?>