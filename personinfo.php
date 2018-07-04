<?php
    $uid = $_GET['uid'];
    include 'connection.php';
    $sql1 = 'select grade , name , sex , sage , workclass , worktype from user , basicinfo where user.uid='.$uid.' and user.uid = basicinfo.uid';
    include 'connection.php';
    $res = mysqli_query($link , $sql1);
    $shenfen = '';
    $row = '';
    if(mysqli_num_rows($res) <= 0){
        echo "<script language=javascript>alert('查询失败！');</script>";
    }
    else{
        $row = mysqli_fetch_array($res);
        $grade = $row[0];
        if($grade == 1){
            $shenfen = '团队负责人';
        }else if($grade == 2){
            $shenfen = '项目负责人';
        }else{
            $shenfen = "成员";
        }
    }
    //查询项目总数
    if($shenfen == '成员'){
        $sql_xmsum = 'select count(DISTINCT pid) from work where uid = '.$uid;//work表中的uid指成员
    }else{
        $sql_xmsum = 'select count(DISTINCT pid) from projectinfo where uid = '.$uid;//project表中的uid指项目负责人
    }
    $res_xmsum = mysqli_query($link , $sql_xmsum);
    $row_xmsum = mysqli_fetch_array($res_xmsum);
    $xmsum = $row_xmsum[0];

    //查询资源总数
    $sql_zysum = 'SELECT count(*) FROM source WHERE uid =  ' .$uid;
    $res_zysum = mysqli_query($link , $sql_zysum);
    $row_zysum = mysqli_fetch_array($res_zysum);
    $zysum = $row_zysum[0];

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
                <p class="l_p">等级：<?php echo $row[0];?></p>
                <p class="l_p">账号类型：<?php echo $shenfen;?></p>
                <p class="l_p">状态：<?php echo $row[5];?></p>
            </div>

        </div>
        <!--右边区域-->
        <div class="_right">
            <!--右上区域-->
            <div class="r_top">
                <div class="tu">
                    <img class="r_img" src="img/xiangmu.png">
                    <p class="name">项目</p>
                    <p class="num"><?php echo $xmsum; ?></p>
                </div>
                <div class="tu">
                    <img class="r_img" src="img/wendang.png">
                    <p class="name">资料</p>
                    <p class="num"><?php echo $zysum; ?></p>
                </div>
            </div>
            <!--右下区域-->
            <div class="r_bottom">
                <div class="r_bottom_top">
                    <div class="tubiao"></div>
                    <div class="jibenxinxi"> 基本信息</div>
                </div>
                <div class="r_bottom_bottom">
                    <table style="font-size: 13px;">
                        <tr><td class="lei">员工编号</td> <td class="zhi"><?php echo $uid;?></td></tr>
                        <tr><td class="lei">姓名</td><td class="zhi"><?php echo $row[1];?></td></tr>
                        <tr><td class="lei">性别</td><td class="zhi"><?php echo $row[2];?><td></tr>
                        <tr><td class="lei">年龄</td><td class="zhi"><?php echo $row[3];?></td></tr>
                        <tr><td class="lei">工作类别</td><td class="zhi"><?php echo $row[4];?></td> </tr>
                        <tr><td class="lei">状态</td><td class="zhi"><?php echo $row[5];?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>