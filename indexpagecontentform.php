<?php
$sql1= 'select nname,ntime,nid from notic where ntype="团队新闻"';
$sql2= 'select nname,ntime,nid from notic where ntype="项目公告"';
$sql3= 'select nname,ntime,nid from notic where ntype="会议通知"';
$sql4= 'select nname,ntime,nid from notic where ntype="团队公告"';

include 'connection.php';
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
    .container {
    position: relative;
    width: 600px;
      height: 200px;
      margin:25px 60px;
      box-shadow: 0 0 5px green;
      overflow: hidden;
    }
    .news{
        position:relative;
        width: 600px;
        height:auto;
       padding: 10px 40px;
    }
    .list1 ,.list2 ,.list3{
        list-style: none;
        clear: both;
        padding-top: 4px;
    }
    .title11,.title111,.title22,.title222 ,.title33,.title333{

        float: left;

    }

    .title1111,.title2222,.title3333{
        height: 2px;
        width: 300px;
        background: -webkit-linear-gradient(left,deepskyblue,gray,white);
        clear: both;
    }
.content1,.content2,.content3{
    margin-top: 15px;
    margin-left: 20px;
    clear: both;
}
.content11,.content22{
    width: 600px;
    margin: 10px ;
}
    .content33{
        width: 400px;
        margin: 10px;
    }
    .content11 li,.content22 li ,.content33 li{
        line-height: 25px;
        height: 25px;
        margin-left: 10px;
    }
    .content11 li a,.content22 li a{
        display:block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:unset ;
        float: left;
        width: 350px;
        color: black;
        font-size: 14px;
        font-family: "Microsoft YaHei";
    }
    .content33 li a{
        line-height: 30px;
        display:block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:unset ;
        float: left;
        width: 350px;
        color: black;
        font-size: 14px;
        font-family: "Microsoft YaHei";
    }
    .content11 li span,.content22 li span{
        float: right;
        margin-right: 30px;
        position: relative;
        font-size: 14px;
        font-family: "Microsoft YaHei";
        color: #949494;
    }
    .content33 li span{
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

    .container .wrap {
    position: absolute;
    width: 4200px;
      height: 200px;
      z-index: 1;
    }
    .container .wrap img {
    float: left;
    width: 600px;
      height: 200px;
    }
    .container .buttons {
    position: absolute;
    right: 5px;
      bottom:40px;
      width: 150px;
      height: 10px;
      z-index: 2;
    }
    .container .buttons span {
    margin-left: 5px;
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background-color: #949494;
      text-align: center;
      color:white;
      cursor: pointer;
    }
    .container .buttons span.on{
    background-color:#21A957 ;
    }
    .container .arrow {
    position: absolute;
    top: 35%;
    color: green;
    padding:0px 14px;
      border-radius: 50%;
      font-size: 50px;
      z-index: 2;
      display: none;
    }
    .container .arrow_left {
    left: 10px;
    }
    .container .arrow_right {
    right: 10px;
    }
    .container:hover .arrow {
    display: block;
}
    .container .arrow:hover {
    background-color: rgba(0,0,0,0.2);
    }
  </style>
</head>
<body id="bg" style="width: 100%;">
<div>
   <div style="float: left">
    <!--轮播图-->
        <div class="container">
    <div class="wrap" style="left: -600px;">
      <img src="./img/5.png" alt="">
      <img src="./img/1.png" alt="">
      <img src="./img/2.png" alt="">
      <img src="./img/3.png" alt="">
      <img src="./img/4.png" alt="">
      <img src="./img/5.png" alt="">
      <img src="./img/1.png" alt="">
    </div>
    <div class="buttons">
      <span class="on">1</span>
      <span>2</span>
      <span>3</span>
      <span>4</span>
      <span>5</span>
    </div>
    <a href="javascript:;" rel="external nofollow" class="arrow arrow_left"></a>
    <a href="javascript:;" rel="external nofollow"  class="arrow arrow_right"></a>
  </div>

        <div class="news">
        <div class="new1">
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
        </div>
      <div style="clear: both;height: 20px;"></div>
      <div class="new2">
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
       </div>
        </div>

  </div>
    <div class="new3" style="float: left;margin-top: 60px; margin-left: -20px;">
        <div class="title3">
            <div  class="title33" >
                <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">会议通知</p>
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
                    while($row3 = mysqli_fetch_array($res3)) {
                        ?>
                        <li><img class="bg1" src="./img/home.png"><a
                                    href="noticecontentform.php?nid=<?php echo $row3[2];?>"><?php echo $row3[0]; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="title3" style="margin-top:70px;">
            <div  class="title33" >
                <p style="text-align: left;padding: 5px;margin: 0px 10px;font-family:'黑体';color:#3299fd ;font-size: 24px;font-weight: bold;text-shadow:0 0 0.5em #D1EEEE,-0 -0 0.5em #D1EEEE;">团队公告</p>
            </div>
            <div class="title333">
                <p style="font-family: 'Agency FB';font-weight: bold;font-size: 15px;color:#3299fd;text-align: left; text-shadow:0 0 0.2em #C1FFC1,-0 -0 0.2em #C1FFC1;margin: 6px 0px;">Team Bulletin </p>
                <div class="title3333"></div>
            </div>

        </div st>
        <div class="content3">
            <div class="content33">
                <ul class="list3">
                    <?php
                    while($row4 = mysqli_fetch_array($res4)) {
                        ?>
                        <li><img class="bg1" src="./img/home.png"><a
                                    href="noticecontentform.php?nid=<?php echo $row4[2];?>"><?php echo $row4[0]; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
  <!--<div style="float: left;width: 350px;height: 600px;background-color: lime;margin-top: 25px;"></div>-->
</div>
  <script>
    var wrap = document.querySelector(".wrap");
    var next = document.querySelector(".arrow_right");
    var prev = document.querySelector(".arrow_left");
    next.onclick = function () {
        next_pic();
    }
    prev.onclick = function () {
        prev_pic();
    }
    function next_pic () {
        index++;
        if(index > 4){
            index = 0;
        }
        showCurrentDot();
        var newLeft;
        if(wrap.style.left === "-3600px"){
            newLeft = -1200;
        }else{
            newLeft = parseInt(wrap.style.left)-600;
        }
        wrap.style.left = newLeft + "px";
    }
    function prev_pic () {
        index--;
        if(index < 0){
            index = 4;
        }
        showCurrentDot();
        var newLeft;
        if(wrap.style.left === "0px"){
            newLeft = -2400;
        }else{
            newLeft = parseInt(wrap.style.left)+600;
        }
        wrap.style.left = newLeft + "px";
    }
    var timer = null;
    function autoPlay () {
        timer = setInterval(function () {
            next_pic();
        },1000);
    }
    autoPlay();

    var container = document.querySelector(".container");
    container.onmouseenter = function () {
        clearInterval(timer);
    }
    container.onmouseleave = function () {
        autoPlay();
    }

    var index = 0;
    var dots = document.getElementsByTagName("span");
    function showCurrentDot () {
        for(var i = 0, len = dots.length; i < len; i++){
            dots[i].className = "";
        }
      dots[index].className = "on";
    }

    for (var i = 0, len = dots.length; i < len; i++){
    (function(i){
        dots[i].onclick = function () {
            var dis = index - i;
            if(index == 4 && parseInt(wrap.style.left)!==-3000){
                dis = dis - 5;
            }
            //和使用prev和next相同，在最开始的照片5和最终的照片1在使用时会出现问题，导致符号和位数的出错，做相应地处理即可
            if(index == 0 && parseInt(wrap.style.left)!== -600){
                dis = 5 + dis;
            }
            wrap.style.left = (parseInt(wrap.style.left) + dis * 600)+"px";
            index = i;
            showCurrentDot();
        }
      })(i);
}
  </script>
</body>
</html>