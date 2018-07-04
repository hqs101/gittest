<?php
    session_start();
    $grade = $_SESSION['grade'];
    $key = $_GET['key'];
    //$sql = 'select projectinfo.pid , pname , name , pstatus , count(work.uid) from projectinfo , work , basicinfo where projectinfo.pid = work.pid and basicinfo.uid = projectinfo.uid group by work.pid';
    $sql = 'select projectinfo.pid , pname , name , pstatus , pschedule from projectinfo , basicinfo where  basicinfo.uid = projectinfo.uid';
    include 'connection.php';
    if($key != '')
        $sql = $sql.' and pname like "%'.$key.'%"';
    $res = mysqli_query($link , $sql);
?>
<html>
<head>
    <link rel="stylesheet" href="css/userlist.css">
</head>
<body>
<!--全局-->
<div class="global" style="margin-left: 100px;margin-top: 60px;">
    <!--顶部搜索块-->
    <div class="_top">
        <form action="projectlist.php" method="get">
            <span class="lable">关键字：</span>
            <input class="input" type="text" name="key">
            <button class="but" type="submit">搜索</button>
        </form>
    </div>
    <!--下部成员列表块-->
    <div class="list">
        <table class="l_table">
            <tr>
                <td width="50px" class="l_td">编号</td>
                <td width="300px" class="l_td">名称</td>
                <td width="80px;" class="l_td">负责人</td>
                <td width="80px;" class="l_td">进度</td>
                <td width="70px" class="l_td">状态</td>
                <td width="130px" class="l_td">操作</td>
            </tr>
            <?php
                $i = 1;
                while($row = mysqli_fetch_array($res))
                {
            ?>
                <tr class="l_tr">
                    <td width="50px" class="l_t"><?php echo $i;?></td>
                    <td width="300px;" class="l_t"><?php echo $row[1];?></td>
                    <td width="80px" class="l_t"><?php echo $row[2];?></td>
                    <td width="80px" class="l_t"><?php echo $row[4];?>%</td>
                    <td width="70px" class="l_t"><?php echo $row[3]=='on'?'进行中':($row[3]=='end'?'已完成':'逾期');?></td>
                    <td width="130px;" style="text-align: center; color: #2a9cdd;" class="l_t">
                        <a style="text-decoration:none;display: <?php echo $grade==3?'none':'inline'; ?>" href="alterprojectform.php?pid=<?php echo $row[0];?>">修改</a>
                        <a style="text-decoration:none;" href="chakanprojectinfo.php?pid=<?php echo $row[0];?>">查看</a>
                        <a style="text-decoration:none;display: <?php echo $grade==1?'inline':'none'; ?>" href="deleteproject.php?pid=<?php echo $row[0];?>">删除</a>
                    </td>
                </tr>
            <?php
                $i++;
                }
            ?>
        </table>
    </div>
    <div>
        <?php
            include 'graph.php';
        ?>
    </div>
</div>
</body>
</html>