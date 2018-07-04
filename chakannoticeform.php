<?php
include 'connection.php';
$sql1= 'select nname,ntime,nid from notic where ntype="团队新闻"';
$sql2= 'select nname,ntime,nid from notic where ntype="团队公告"';
$sql3= 'select nname,ntime,nid from notic where ntype="项目公告"';
$sql4= 'select nname,ntime,nid from notic where ntype="会议通知"';
$res1=mysqli_query($link,$sql1);
$res2=mysqli_query($link,$sql2);
$res3=mysqli_query($link,$sql3);
$res4=mysqli_query($link,$sql4);
mysqli_close($link);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>indexpagecontent</title>
  <style>
    * {
    margin:0;
    padding:0;
}
    a{
    text-decoration: none;
    }
    #bg{background-image:url(img/content/dotted.png);}
    .news{
    position:relative;
    width: 100%;
    height:auto;
    padding: 10px 5px;
        margin-top: 20px;
        margin-left: 20px;
    }
    .news1,.news2{
        float: left;
    }

    .list1 ,.list2 ,.list3,.list4{
    list-style: none;
        clear: both;
        padding-top: 4px;
    }
    .title11,.title111,.title22,.title222 ,.title33,.title333,.title44,.title444{

    float: left;

}

    .title1111,.title2222,.title3333,.title4444{
    height: 2px;
        width: 150px;
        background: -webkit-linear-gradient(left,deepskyblue,gray,white);
        clear: both;
    }
.content1,.content2,.content3,.content4{
    margin-top: 10px;
    margin-left: 15px;
    clear: both;
}
.content11,.content22,.content33,.content44{
    width: 450px;
    margin: 10px ;
}
    .content11 li,.content22 li ,.content33 li,.content44 li{
    line-height: 25px;
        height: 25px;
        margin-left: 10px;
    }
    .content11 li a,.content22 li a,.content33 li a,.content44 li a{
    display:block;
    white-space:nowrap;
        overflow:hidden;
        text-overflow:unset ;
        float: left;
        width: 160px;
        color: black;
        font-size: 14px;
        font-family: "Microsoft YaHei";
    }
    .content11 li span,.content22 li span,.content33 li span,.content44 li span{
    float: right;
    margin-right: 30px;
        position: relative;
        font-size: 14px;
        font-family: "Microsoft YaHei";
        color: #949494;
    }
    .bg1 {
    float: left;
    height:25px;
        width: 25px;
        margin-left: 10px;
    }

    li{
    clear: both;
    font-family: "微软雅黑";
        font-size: 16px;
        margin-top: 10px;
    }


  </style>
</head>
<body id="bg" style="width: 100%; margin-left: 40px;">
<div class="news">
    <div class="news1">
        <div class="title1">
                <div  class="title11" >
            <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">团队新闻</p>
                </div>
                <div class="title111">
                    <p style="font-family: 'Agency FB';font-weight: bold;font-size: 15px;color:#3299fd;text-align: left; text-shadow:0 0 0.2em #C1FFC1,-0 -0 0.2em #C1FFC1;margin: 6px 0px;">Team Bulletin </p>
                    <div class="title1111"></div>
                </div>

            </div>
        <div class="content1">
            <div class="content11">
        <ul class="list1">
            <?php
                while($row1 = mysqli_fetch_array($res1)) {
                    ?>
                    <li><img class="bg1" src="./img/home.png"><a
                                href="noticecontentform.php?nid=<?php echo $row1[2];?>"><?php echo $row1[0]; ?></a><span><?php echo $row1[1]; ?></span></li>
                    <?php
                }
            ?>
        </ul>
            </div>
        </div>
        <div class="title2">
            <div  class="title22" >
                <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">项目公告</p>
            </div>
            <div class="title222">
                <p style="font-family: 'Agency FB';font-weight: bold;font-size: 15px;color:#3299fd;text-align: left; text-shadow:0 0 0.2em #C1FFC1,-0 -0 0.2em #C1FFC1;margin: 6px 0px;left: 0px;">Team Bulletin </p>
                <div class="title2222"></div>
            </div>

        </div>
        <div class="content2">
            <div class="content22">
                <ul class="list2">
                    <?php
                    while($row3 = mysqli_fetch_array($res3)) {
                        ?>
                        <li><img class="bg1" src="./img/home.png"><a
                                    href="noticecontentform.php?nid=<?php echo $row3[2];?>"><?php echo $row3[0]; ?></a><span><?php echo $row3[1]; ?></span></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
    <div class="news2">
        <div class="title3">
            <div  class="title33" >
                <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">团队公告</p>
            </div>
            <div class="title333">
                <p style="font-family: 'Agency FB';font-weight: bold;font-size: 15px;color:#3299fd;text-align: left; text-shadow:0 0 0.2em #C1FFC1,-0 -0 0.2em #C1FFC1;margin: 6px 0px;">Team Bulletin </p>
                <div class="title3333"></div>
            </div>

        </div>
        <div class="content3">
            <div class="content33">
                <ul class="list3">
                    <?php
                    while($row2 = mysqli_fetch_array($res2)) {
                        ?>
                        <li><img class="bg1" src="./img/home.png"><a
                                    href="noticecontentform.php?nid=<?php echo $row2[2];?>"><?php echo $row2[0]; ?></a><span><?php echo $row2[1]; ?></span></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="title4">
            <div  class="title44" >
                <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">会议通知</p>
            </div>
            <div class="title444">
                <p style="font-family: 'Agency FB';font-weight: bold;font-size: 15px;color:#3299fd;text-align: left; text-shadow:0 0 0.2em #C1FFC1,-0 -0 0.2em #C1FFC1;margin: 6px 0px;">Team Bulletin </p>
                <div class="title4444"></div>
            </div>

        </div>
        <div class="content4">
            <div class="content44">
                <ul class="list4">
                    <?php
                    while($row4 = mysqli_fetch_array($res4)) {
                        ?>
                        <li><img class="bg1" src="./img/home.png"><a
                                    href="noticecontentform.php?nid=<?php echo $row4[2];?>"><?php echo $row4[0]; ?></a><span><?php echo $row4[1]; ?></span></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
     </div>
</div>

</body>
</html>