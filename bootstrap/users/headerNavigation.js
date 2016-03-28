/**
 * Created by chenkai on 16/3/28.
 */
$(document).ready(function(){
    var userName = $.cookie("username");
    var login = $.cookie("isLogin");
    var token = $.cookie("token");
    console.log(userName);
    console.log(login);
    console.log(token);
    var rightEle = $("#rightpull");
    if (!userName){
        var loginEle = document.createElement("li");
        loginEle.id = "loginBtn";
        loginEle.innerHTML = "<a href='http://www.maincode.cn/loginAndRegist/login.html' target='_self'>登录</a>";

        var divider = document.createElement("li");
        divider.setAttribute("class","divider-vertical");

        var registEle = document.createElement("li");
        registEle.id = "registBtn";
        registEle.innerHTML = "<a href='http://www.maincode.cn/loginAndRegist/regist.html' target='_self'>注册</a>";

        //动态创建和添加:
        rightEle.append(loginEle);
        rightEle.append(divider);
        rightEle.append(registEle);
    }else {
        var li = document.createElement("li");
        li.setAttribute("class","divider-vertical");
        rightEle.append(li);
        var dropdown = document.createElement("li");
        dropdown.setAttribute("class","dropdown");
        dropdown.id = "profile";
        dropdown.innerHTML = "<a id='myUsername' data-toggle='dropdown' class='dropdown-toggle' href='#'>"
            + userName
            + "<strong class='caret'></strong></a>"
            + "<ul class='dropdown-menu'><li>"
            + "<a href='#' target='_blank'>消息中心</a></li>"
            + "<li><a href='#' target='_blank'>个人资料</a></li>"
            + "<li><a href='#' target='_blank'>我的博客</a></li>"
            + "<li><a href='#' target='_blank'>我的书单</a></li>"
            + "<li><a href='#' target='_blank'>我的匿名</a></li>"
            + "<li><a id='cancelbtn' href='#'>注销</a></li>"
            + "</ul>";
        rightEle.append(dropdown);
    }
});
console.log("每一位少年都需要成长和努力!");
console.log("每一位成年都肩负着家庭和责任!");
console.log("你需要一个展示自己的舞台!");
console.log("加入我们:简历发送到ochenkai@163.com.主题:求职-From:Console-应聘岗位");