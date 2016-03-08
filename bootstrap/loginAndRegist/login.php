
<?php

    $userName = $_POST["username"];
    $password = $_POST["password1"];

    if(strlen($password) >= 6){
        isLogin($userName,$password);
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
    setcookie("username", $lusername,time()+31, "/", ".maincode.cn");
    echo $lusername;

    //重定向浏览器
    header("Location: http://www.maincode.cn/profile/profile.html");
    //确保重定向后，后续代码不会被执行
    exit;
}


?>
