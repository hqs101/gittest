<?php
    $uid = $_GET['uid'];
    include 'connection.php';
    $sql = 'select * from contactinfo where uid = '.$uid;
    $res = mysqli_query($link , $sql);
    $row = '';
    if(mysqli_num_rows($res) <= 0){
        echo "<script language=javascript>alert('查询失败！');</script>";
    }else{
        $row = mysqli_fetch_array($res);
    }
?>

<html>
<head>
    <link type="text/css" href="css/contactinfo.css" rel="stylesheet">
</head>
<body>
<div class="r_bottom">
    <div class="r_bottom_top">
        <div class="tubiao"></div>
        <div class="jibenxinxi"> 联系信息</div>
    </div>
    <div class="r_bottom_bottom">
        <table style="font-size: 13px;">
            <tr><td class="lei">电话</td> <td class="zhi"><?php echo $row[1];?></td></tr>
            <tr><td class="lei">邮箱</td><td class="zhi"><?php echo $row[2];?></td></tr>
            <tr><td class="lei">地址</td><td class="zhi"><?php echo $row[3];?></td></tr>
            <tr><td class="lei">办公室电话</td><td class="zhi"><?php echo $row[4];?></td></tr>
        </table>
    </div>
</div>
</body>
</html>