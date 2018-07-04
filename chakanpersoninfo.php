<?php
    session_start();
    $url = $_SERVER["REQUEST_URI"];
    $check = strpos($url, 'uid');
    $uid = '';
    if($check == false){  //url中没有uid变量，那么从session获取uid
        $uid = $_SESSION['uid'];
       }else{
        $uid = $_GET['uid'];
    }
    include 'connection.php';
    $sql = 'select uid , name , sex , sage , photo from basicinfo where uid = '.$uid;
    $res = mysqli_query($link , $sql);
    $row = '' ;            //存储查询信息
    if(mysqli_num_rows($res) <= 0){
        echo "<script language=javascript>alert('查询失败！');</script>";
    }
    else{
        $row = mysqli_fetch_array($res);
    }
?>
<html>
<head>
    <title>个人信息</title>
    <link rel="stylesheet" type="text/css" href="css/alteruserinfoform.css" />
</head>
<body>
<div class="global">
    <div class="header">
        <img class="img1" src="upload/photo/<?php echo $row[4];?>">
        <span class="name"><?php echo $row[1];?></span><span class="sex">(<?php echo $row[2];?>)<?php echo $row[3];?>岁</span><span class="uid"><?php echo $row[0];?></span>
        <span class="caidan">
            <ul  class="cul">
                <li class="cli"><a class="cli_a" href="personinfo.php?uid=<?php echo $uid;?>" target="win">基本信息&nbsp;&nbsp;|</a></li>
                <li class="cli"><a class="cli_a" href="contactinfo.php?uid=<?php echo $uid;?>"  target="win">联系信息&nbsp;&nbsp;|</a></li>

            </ul>
        </span>
    </div>
    <div class="content">
        <iframe src="personinfo.php?uid=<?php echo $uid;?>" frameborder="no" class="win" name="win"></iframe>
    </div>
</div>
</body>
</html>