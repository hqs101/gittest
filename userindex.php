<?php
session_start();
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>项目管理系统-user </title>
    <style type="text/css">
        body{margin:0;padding:0;overflow-x:hidden;}
        html, body{height:100%;}
        img{border:none;}
        *{font-family:'微软雅黑';font-size:12px;color: #222222}
        /*dl,dt,dd为块级元素显示*/
        dl,dt,dd{display:block;margin:0;}
        a{text-decoration:none;}
        #bg{background-image:url(img/content/dotted.png);}
        .container{width:100%;height:100%;margin:auto;}
        .head{width: 100%;height: 60px;margin: auto;position: fixed;background-color:#0070c1;float: left;}
        .head1{text-align:center;width: 225px;height: 60px;margin: auto;position: fixed;background-color: #0084f6;float: left;}
        .xm{
            font-family: "Microsoft YaHei";
            font-weight: bold;
            font-size:18px;
            color: #aeeeee;

        }
        .xm:hover{
            color: white;
        }

        /*left*/
        .leftsidebar_box{width:225px;height:auto !important;overflow:visible !important;position:fixed;height:100% !important;background-color:#2a2e34;margin-top: 60px;}/*左边框的整体颜色*/
        .leftsidebar_box dt{padding-left:40px;padding-right:10px;background-repeat:no-repeat;background-position:10px center;color:#f5f5f5;font-size:15px;position:relative;line-height:60px;cursor:pointer;}/*一级dt字体颜色*/
        .leftsidebar_box dd{background-color:#2a2e34;padding-left:40px;}/*二级标题背景*/
        .leftsidebar_box dd a{color:#f5f5f5;line-height:20px;font-size:14px;line-height: 30px;}/*二级标题字体颜色*/
        .leftsidebar_box dt img{position:absolute;right:10px;top:20px;}
        .system_log dt{background-image:url(img/left/system.png)}
        .custom dt{background-image:url(img/left/custom.png)}
        .channel dt{background-image:url(img/left/channel.png)}
        .app dt{background-image:url(img/left/app.png)}
        .cloud dt{background-image:url(img/left/cloud.png)}
        .syetem_management dt{background-image:url(img/left/syetem_management.png)}
        .source dt{background-image:url(img/left/source.png)}
        .statistics dt{background-image:url(img/left/statistics.png)}
        .leftsidebar_box dl dd:last-child{padding-bottom:10px;}
    </style>

</head>

<body id="bg">

<div class="container">
    <!--header-->
    <div class="head">
        <div class="head1">
            <span style="font-size:15px;color: white;line-height: 60px;">Team-Manage | 项目管理</span>
        </div>
        <div style="text-align: center;">
            <span style="line-height: 60px;margin-left: 240px;width: 100px;"><a class="xm"  href="projectlist.php?key=" target="window">项目</a></span>
            <span style="line-height: 60px;margin-left: 40px;width: 100px;"><a class="xm"  href="userlist.php?key=" target="window">成员</a></span>
            <span style="line-height: 60px;margin-left: 40px;width: 100px;"><a class="xm"  href="ziyuanxiazai.php?path=" target="window">资源</a></span>
            <span style="line-height: 60px;margin-left: 40px;width: 100px;"><a class="xm"  href="chakannoticeform.php" target="window">公告</a></span>
            <span style="line-height: 60px;margin-left: 400px;width: 100px;"><a  class="xm" href="qiandao.php">签到</a></span>
            <span style="line-height: 60px;margin-left: 50px;width: 100px;"><a class="xm" href="qiantui.php">签退</a></span>
            <span style="line-height: 60px;float: right;margin-right: 70px;"><a style="font-size:16px;font-weight:bold;line-height: 60px;color: white;" href="exit.php">【退出】</a></span>
        </div>
    </div>
    <!--左侧导航栏-->
    <div class="leftsidebar_box">
        <dl class="system_log">
            <dt onClick="changeImage()"><a style="color: #ffffff; font-size: 15px;" href="indexpagecontentform.php" target="window">首页</a><img src="img/left/select_xl01.png"></dt>
        </dl>

        <dl class="custom">
            <dt onClick="changeImage()">成员中心<img src="img/left/select_xl01.png"></dt>
            <dd><a href="userlist.php?key=" target="window">成员列表</a></dd>
        </dl>

        <dl class="channel">
            <dt>项目管理<img src="img/left/select_xl01.png"></dt>
            <dd><a href="projectlist.php?key=" target="window">项目进度</a></dd>
        </dl>
        <dl class="syetem_management">
            <dt>公告管理<img src="img/left/select_xl01.png"></dt>
            <dd><a href="chakannoticeform.php" target="window">查看公告</a></dd>
        </dl>

        <dl class="source">
            <dt>资源管理<img src="img/left/select_xl01.png"></dt>
            <dd class="first_dd"><a href="shangchuanziliaoform.php" target="window">资源上传</a></dd>
            <dd><a href="ziyuanxiazai.php" target="window">资源下载</a></dd>
        </dl>

        <dl class="statistics">
            <dt>个人中心<img src="img/left/select_xl01.png"></dt>
            <dd class="first_dd"><a href="chakanpersoninfo.php" target="window">个人信息</a></dd>
            <dd class="first_dd"><a href="alterpersoninfoform.php?uid=<?php echo $uid;?>" target="window">修改个人信息</a></dd>
            <dd><a href="alterpwdform.php" target="window">修改密码</a></dd>
            <dd><a href="exit.php">退出系统</a></dd>
        </dl>
    </div>
    <!--主体显示窗口-->
    <div style="width: 100%; height: 90%; float: left; margin-left: 225px; margin-top: 60px;">
        <iframe src="indexpagecontentform.php" frameborder="no" name="window" style="height: 100%; width: 100%;"></iframe>
    </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(".leftsidebar_box dt").css({"background-color":"#2a2e34"});/*一级dt的背景颜色*/
    $(".leftsidebar_box dt img").attr("src","img/left/select_xl01.png");
    $(function(){
        $(".leftsidebar_box dd").hide();
        $(".leftsidebar_box dt").click(function(){
            $(".leftsidebar_box dt").css({"background-color":"#2a2e34"})/*没选中的一级dt的背景颜色*/
            $(this).css({"background-color": "#646d7d"});/*选中的一级dt的背景颜色*/
            $(this).parent().find('dd').removeClass("menu_chioce");
            $(".leftsidebar_box dt img").attr("src","img/left/select_xl01.png");
            $(this).parent().find('img').attr("src","img/left/select_xl.png");
            $(".menu_chioce").slideUp();
            $(this).parent().find('dd').slideToggle();
            $(this).parent().find('dd').addClass("menu_chioce");
        });
    })
</script>
</body>
</html>
