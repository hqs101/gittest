<?php
    $pid = $_GET['pid'];
    include 'connection.php';
    //查询项目的基本信息
    $sql = 'select pname ,projectinfo.uid , name , endtime , pdescribe from projectinfo , basicinfo where projectinfo.uid = basicinfo.uid and pid ='.$pid;
    $res = mysqli_query($link , $sql);
    $row1 = mysqli_fetch_array($res);

    //查询项目负责人
    $sql_user = 'select user.uid , name from user , basicinfo where grade = 2 and user.uid = basicinfo.uid';
    $res_user = mysqli_query($link , $sql_user);

    //查询项目任务的分配信息
    $sql_renwu = 'select work.uid , name , worktask from basicinfo , work where work.uid = basicinfo.uid and  pid = '.$pid;
    $res_renwu = mysqli_query($link , $sql_renwu);
    $data_renwu = array();
    while($row_renwu = mysqli_fetch_array($res_renwu))
        $data_renwu[] = $row_renwu;

    //查询所有成员
    $sql_usercy = 'select user.uid , name from user , basicinfo where grade = 3 and user.uid = basicinfo.uid';
    $res_usercy = mysqli_query($link , $sql_usercy);
    $data_usercy=array();
    while($row_usercy = mysqli_fetch_array($res_usercy))
        $data_usercy[] = $row_usercy;
?>
<html>
<head>
    <title>项目修改 </title>
    <link rel="stylesheet" type="text/css" href="css/fabuprijectform.css" />
</head>
<body>
<div class="new">
    <h1 class="lable">项目修改</h1>
    <form action="alterproject.php" method="post">
        <!--项目基本信息-->
        <div style="float: left; margin-right: 100px;">
            <div class="new1">
                项&nbsp;&nbsp;目&nbsp;&nbsp;ID：<input readonly style="padding: 10px;background-color: #d3d3d3;" id="id" class="newid" type="text" name="pid" value="<?php echo $pid; ?>">
            </div>
            <div class="new1">
                项目名称：<input style="padding: 10px;" id="id" class="newid" type="text" name="pname" value="<?php echo $row1[0]; ?>">
            </div>
            <div class="new2">
                负&nbsp;责&nbsp;&nbsp;人：<select class="grade" name="uid">
                    <option value="0"><==选择项目负责人==></option>
                    <?php
                    while($row = mysqli_fetch_array($res_user)){
                        ?>
                        <option value="<?php echo $row[0]; ?>" <?php echo $row[1]==$row1[2]?'selected':''; ?>><?php echo $row[1]; ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="new2">
                <font style="line-height: 150px; ">概&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</font><textarea style="background-color: #d3d3d3;" class="jianjie" rows="10" name="jianjie" readonly><?php echo $row1[4]; ?></textarea>
            </div>
            <div class="new2">
                完成时间：<input type="date" class="newid" name="endtime" value="<?php echo $row1[3]; ?>">
            </div>
        </div>
        <!--项目任务信息-->
        <div style="float: left; margin-top: 40px;">
            <div>
                <div class="con">
                    需求分析：
                    <?php
                   foreach ($data_usercy as $item1){
                            ?>
                            <input type="checkbox" name="xq[]" value="<?php echo $item1['uid']; ?>"
                            <?php
                                foreach ($data_renwu as $renwu1){
                                    if($renwu1['uid']==$item1['uid'] && $renwu1['worktask']=='需求分析'){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                            <span><?php echo $item1['name']; ?></span>
                            <?php
                    }
                    ?>
                </div>
                <div class="con">
                    系统设计：
                    <?php
                   foreach ($data_usercy as $item2) {
                            ?>
                            <input type="checkbox" name="sj[]" value="<?php echo $item2['uid']; ?>"
                            <?php
                                foreach ($data_renwu as $renwu2){
                                    if($renwu2['uid']==$item2['uid'] && $renwu2['worktask']=='系统设计'){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                            <span><?php echo $item2['name']; ?></span>
                            <?php
                    }
                    ?>
                </div>
                <div class="con">
                    编码实现：
                    <?php
                   foreach ($data_usercy as $item3) {
                        ?>
                        <input type="checkbox" name="sx[]" value="<?php echo $item3['uid']; ?>"<?php
                        foreach ($data_renwu as $renwu3){
                            if($renwu3['uid']==$item3['uid'] && $renwu3['worktask']=='编码实现'){
                                echo 'checked';
                            }
                        }
                        ?>>
                        <span><?php echo $item3['name']; ?></span>
                        <?php
                    }
                    ?>
                </div>
                <div class="con">
                    系统测试：
                    <?php
                    foreach ($data_usercy as $item4) {
                        ?>
                        <input type="checkbox" name="cs[]" value="<?php echo $item4['uid']; ?>"<?php
                        foreach ($data_renwu as $renwu4){
                            if($renwu4['uid']==$item4['uid'] && $renwu4['worktask']=='系统测试'){
                                echo 'checked';
                            }
                        }
                        ?>>
                        <span><?php echo $item4['name']; ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="new3" style="clear: both; ">
            <input class="button1" type="submit" value="更  改">
            <input class="button2" type="reset" value="取  消">
        </div>
    </form>
</div>
</body>
</html>





