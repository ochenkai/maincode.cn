
<?php
    $ckuserName = $_POST['username'];
    $ckpassword = $_POST['password1'];

    if(strlen($ckpassword) > 0 && isset($_POST['password1']) && isset($_POST['username'])){
        isLogin($ckuserName,$ckpassword);
    }else {
        loginError();
    }

function isLogin($lname,$lpassword) {
    $connect = mysql_connect("rds5w5g54gsw7o6bwchh3.mysql.rds.aliyuncs.com","rn01229683o8k84q","chenkairn01229683o8k84q");
    if(!$connect) {
        die("Could not connect DataBase");
    }

    mysql_select_db("rn01229683o8k84q",$connect);

    $result = mysql_query("SELECT username,password FROM maincode_users WHERE username='$lname'");

    if($result) {
        echo  $lname;
        $flag = 0;
        while ($row = mysql_fetch_array($result)) {
            echo $row['username'];
            echo $row['password'];

            if (strcmp($row['password'],$lpassword) == 0) {
                $flag = 1;
            }
        }
        if ($flag == 0) {
         loginError();
        }else {
         login($lname);
        }
    }

    mysql_close($connect);
}

function loginError() {
    //重定向浏览器
//    header("Location: http://www.maincode.cn/loginAndRegist/login.html");
    //确保重定向后，后续代码不会被执行
    echo "帐号或密码错误";

    exit;
}

function login($lusername) {
    setcookie("username", $lusername, time()+3600, "/", "www.maincode.cn");
    echo $lusername;
    $md5Name = md5(md5($lusername));
    $_session["susername"] = $md5Name;

    setcookie("token", $md5Name, time()+3600, "/", "www.maincode.cn");
    setcookie("isLogin", "login", time()+3600, "/", "www.maincode.cn");
    //重定向浏览器
    header ("Cache-Control: no-cache, must-revalidate");

    // 告诉客户端浏览器不使用缓存，兼容HTTP 1.0 协议
    header ("Pragma: no-cache");
    header("Location: ../index.html");
    echo ($lusername);
    echo ($_COOKIE["username"]);
    //确保重定向后，后续代码不会被执行
    exit;
}


?>
