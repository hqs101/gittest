<?php
session_start();
$uid = $_SESSION['uid'];
date_default_timezone_set('Asia/Shanghai');//设置时区
$showtime=date("Y-m-d");//获取系统当前时间
include 'connection.php';
$sql1 = 'select grade,name,worktype from user , basicinfo where user.uid="'.$uid.'" and user.uid = basicinfo.uid';
$sql2 = 'select count(*) from kaoqin where status1 is not null and time1="'.$showtime.'"';
$sql3 = 'select count(*) from kaoqin where status2 is not null and time2="'.$showtime.'"';
$sql4 = 'select name,status1,status2 from basicinfo,kaoqin where  basicinfo.uid = kaoqin.uid and time1="'.$showtime.'"and time2 = time1';
$res1 = mysqli_query($link , $sql1);
$res2 = mysqli_query($link , $sql2);
$res3 = mysqli_query($link , $sql3);
$res4 = mysqli_query($link , $sql4);

$shenfen = '';
$row2 = mysqli_fetch_array($res2);
$row3 = mysqli_fetch_array($res3);
if(mysqli_num_rows($res1) <= 0){
    echo "<script language=javascript>alert('查询失败1！');</script>";
}
else{
    $row1 = mysqli_fetch_array($res1);
    $grade = $row1[0];
    if($grade == 1){
        $shenfen = '团队负责人';
    }else if($grade == 2){
        $shenfen = '项目负责人';
    }else{
        $shenfen = "成员";
    }
}
if(mysqli_num_rows($res2) <= 0 || mysqli_num_rows($res3) <= 0 ){
    echo "<script language=javascript>alert('查询失败2！');</script>";
}

                    include 'connection.php';
                    $pageSize = 2;   //每页显示的数量
                    $rowCount = 0;   //要从数据库中获取
                    $pageNow = 1;    //当前显示第几页

                    //如果有pageNow就使用，没有就默认第一页。
                    if (!empty($_GET['pageNow'])){
                        $pageNow = $_GET['pageNow'];
                    }

                    $pageCount = 0;  //表示共有多少页


                    $sql5 = 'select count(*) from kaoqin where time1="'.$showtime.'"and time2 = time1';
                    $res5 = mysqli_query( $link ,$sql5);
                    $row=mysqli_fetch_row($res5);
                    $rowCount = $row[0];

                    //计算共有多少页，ceil取进1
                    $pageCount = ceil(($rowCount/$pageSize));
                    if($pageNow>$pageCount)
                        $pageNow=1;
                    $pre = ($pageNow-1)*$pageSize;

                    $sql4 = 'select name,status1,status2 from basicinfo,kaoqin where  basicinfo.uid = kaoqin.uid and time1="'.$showtime.'"and time2 = time1 limit '.$pre.','.$pageSize;//从第几条数据开始查几条数据
                    $res4 = mysqli_query($link , $sql4);
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/personbasicinfo.css">
</head>
<body>
<!--global-->
<div class="global">
    <!--左边区域-->
    <div class="_left">
        <img class="l_img" src="upload/photo/Koala.jpg">
        <div class="wenzi">
            <p class="l_p">工号：<?php echo $uid;?></p>
            <p class="l_p">等级：<?php echo $row1[0];?></p>
            <p class="l_p">账号类型：<?php echo $shenfen;?></p>
            <p class="l_p">状态：<?php echo $row1[2];?></p>
        </div>

    </div>
    <!--右边区域-->
    <div class="_right">
        <!--右上区域-->
        <div class="r_top">
            <div class="tu">
                <img class="r_img" src="img/xiangmu.png">
                <p class="name">签到</p>
                <p class="num"><?php echo $row2[0];?></p>
            </div>
            <div class="tu">
                <img class="r_img" src="img/wendang.png">
                <p class="name">签退</p>
                <p class="num"><?php echo $row3[0];?></p>
            </div>
        </div>
        <!--右下区域-->
        <div class="r_bottom">
            <div class="r_bottom_top">
                <div class="tubiao"></div>
                <div class="jibenxinxi"> 考勤信息</div>
            </div>
            <div class="r_bottom_bottom">
                <table style="font-size: 13px;">
                    <tr><td class="lei">姓名</td><td class="zhi">签到</td><td class="zhi">签退</td></tr>

                    <?php
                    while($row4 = mysqli_fetch_array($res4)) {
                        ?>
                        <tr>
                            <td class="lei"><?php echo $row4[0]; ?></td>
                            <td class="zhi"><?php echo $row4[1]==''?'未签到':$row4[1]; ?></td>
                            <td class="zhi"><?php echo $row4[2]==''?'未签退':$row4[2]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <div style="text-align: center;margin: 20px;">
                     <form class="yema" action="kaoqinlist.php" method="get" >
                        <input type="text" name="pageNow" placeholder="搜索指定页码" style="text-align: center;">
                        <input type="submit" value="GO">
                    </form>
                    </div>
                </table>
                <div style="text-align: center;margin: 20px;">
                    <?php
                    if ($pageNow==1){
                        echo "<span style=''>第{$pageNow}页&nbsp;&nbsp;&nbsp;共{$pageCount}页</span>";
                    }
                    if($pageNow>1){
                        $prePage = $pageNow-1;
                        echo "<a href='kaoqinlist.php?pageNow=$prePage'>上一页</a>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<span>第{$pageNow}页&nbsp;&nbsp;&nbsp;共{$pageCount}页</span>";
                    }

                    if($pageNow<$pageCount){
                        $nextPage = $pageNow+1;
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href='kaoqinlist.php?pageNow=$nextPage'>下一页</a> ";
                    }
                    echo "<br/><br/>";
                    ?>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>