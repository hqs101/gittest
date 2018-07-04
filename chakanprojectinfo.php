<?php
    $pid = $_GET['pid'];
    include 'connection.php';
    $sql = 'select pid , pname , name , pstatus , pschedule , endtime , jieshaofile from projectinfo , basicinfo where basicinfo.uid = projectinfo.uid and pid = '.$pid;
    $res = mysqli_query($link , $sql);
    $row = mysqli_fetch_array($res);
    if($row[3]=='on')
        $status = '进行中';
    else if($row[3]=='end')
        $status = '完成';
    else
        $status = '逾期';
    mysqli_close($link);
?>

<html>
<head>
    <link rel="stylesheet" href="css/chakanprojectinfo.css" type="text/css">
</head>
<body>
<div class="r_bottom">
    <div class="r_bottom_top">
        <div class="tubiao"></div>
        <div class="jibenxinxi"> 项目基本信息</div>
    </div>
    <div class="r_bottom_bottom">
        <table style="font-size: 13px;">
            <tr><td class="lei">项目编号</td> <td class="zhi"><?php echo $row[0];?></td></tr>
            <tr><td class="lei">项目名称</td><td class="zhi"><?php echo $row[1];?></td></tr>
            <tr><td class="lei">项目负责人</td><td class="zhi"><?php echo $row[2];?><td></tr>
            <tr><td class="lei">状态</td><td class="zhi"><?php echo $status;?></td></tr>
            <tr><td class="lei">进度</td><td class="zhi"><?php echo $row[4];?>%</td> </tr>
            <tr><td class="lei">完成时间</td><td class="zhi"><?php echo $row[5];?></td></tr>
        </table>
    </div>
    <div class="aboutfile">
        相关文件：<a href="wenjjianxiazai.php?pid=<?php echo $pid; ?>&filename=<?php echo $row[6];?>"><?php echo $row[6]; ?></a>
    </div>
</div>
</body>
</html>
