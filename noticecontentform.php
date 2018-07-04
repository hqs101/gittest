<?php
include 'connection.php';
$nid = $_GET['nid'];
$sql1= 'select nname,uid,ntime,ncontent from notic where nid='.$nid;
$res1=mysqli_query($link,$sql1);
$row = mysqli_fetch_array($res1);
mysqli_close($link)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--文档兼容模式的定义。Edge模式告诉IE以最高级模式渲染文档，也就是任何IE版本都以当前版本所支持的最高级标准模式渲染，避免版本升级造成的影响。简单地说，就是什么版本IE就用什么版本的标准模式渲染<meta http-equiv="X-UA-Compatible" content="IE=edge">,使用<meta http-equiv="X-UA-Compatible" content="chrome=1">强制使用Chrome Frame渲染,那么最佳的兼容模式方案是结合考虑两种.-->
    <title>noticecontent</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        #bg{background-image: url(img/content/dotted.png);}
       /*#web_bg{
            position: fixed;
            top: 0;
            left: 0;
            width:100%;
            height:100%;
            min-width: 1000px;
            z-index:-10;
            zoom: 1;
            background-color: #fff;
            background-repeat: no-repeat;
            background-size: cover;//图片随屏幕大小同步缩放，但是有部分可能会被裁切，不过不至于会露白，下面两句是为chrome和opera浏览器作兼容.
           -webkit-background-size: cover;
            -o-background-size: cover;
            background-position: center 0;//图片的位置，居中，靠左对齐。
        }id="web_bg" style="background-image: url(./img/bg.png);"
        */
        .title{
            margin-top: 20px;
        }
        .uid,.ntime{
            margin-top: 20px;
            padding: 5px;
            font-family:'黑体';
            color:#28281e ;
            font-size: 14px;
            font-weight: bold;
            text-shadow:0 0 0.1em #b0e2ff,-0 -0 0.1em #b0e2ff;
        }
        .fenge{
            margin-top: 30px;
            width: 100%;
            height: 2px;
            background: -webkit-linear-gradient(left,red,yellow,blue);
        }
        .content{
            margin-top: 30px;
            margin-left: 30px;
            text-align: left;
            margin-bottom: 50px;
        }
    </style>
</head>
<body id="bg">

<div style="width: 60%; margin-top:20px;margin-left:180px;text-align: center;">
    <div>
        <p class="title" style="text-align: center;padding: 5px;margin-top: 20px;font-family:'黑体';color: black;font-size: 26px;font-weight: bold;text-shadow:0 0 0.5em whitesmoke,-0 -0 0.5em whitesmoke;"><?php echo $row[0];?></p>
        <div>
            <p class="uid">发布人：<?php echo $row[1];?>&nbsp;发布时间：<?php echo $row[2];?></p>
        </div>
        <div class="fenge"></div>
        <div class="content">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[3];?></p>
        </div>

    </div>


</div>
</body>
</html>

