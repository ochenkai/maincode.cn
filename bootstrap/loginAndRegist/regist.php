<?php

$userName = $_POST["username"];
$password = $_POST["password1"];
$email    = $_POST["email"];

//$userName = "username";
//$password = "password1";
//$email    = "email";


if(strlen($password) >= 6){
    isRegist($userName,$password,$email);
}else {
    registError();
}
function isRegist($rname,$rpassword,$remail) {
    $connect = mysql_connect("rds5w5g54gsw7o6bwchh3.mysql.rds.aliyuncs.com","rn01229683o8k84q","chenkairn01229683o8k84q");
    if(!$connect) {
        die("Could not connect DataBase");
    }

    mysql_select_db("rn01229683o8k84q",$connect);
    $userName = $rname;
    $result = mysql_query("SELECT username,password FROM maincode_users WHERE username = '$rname'");
    echo  $rname;

    if($result) {
        $flag = 1;
        while ($row = mysql_fetch_array($result)) {
            if (strcmp($row['password'], $rpassword) == 0) {
                $flag = 0;
                registError();
            }
        }
        if ($flag == 1) {
            $insertResult = mysql_query("INSERT maincode_users (username,email,password) VALUES ('$rname','$remail','$rpassword')");
            echo $insertResult;
//            echo "插入数据";
            if ($insertResult) {
                regist($rname, $rpassword, $remail);
            }
        }
    }
    mysql_close($connect);
}

function registError() {
    //重定向浏览器
    header("Location: http://www.maincode.cn/loginAndRegist/regist.html");
    //确保重定向后，后续代码不会被执行
    //    echo "已经有用户使用了相同的用户名";

    exit;
}

function regist($rname,$rpassword,$remail) {

    setcookie("username", $rname,time()+31, "/", ".maincode.cn");
    echo $rname;

    //重定向浏览器
    header("Location: http://www.maincode.cn/profile/profile.html");
    //确保重定向后，后续代码不会被执行
    exit;
}

?>
