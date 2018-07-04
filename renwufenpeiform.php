<?php
    session_start();
    $uid = $_SESSION['uid'];
    include 'connection.php';
    //获取该项目负责人的负责项目
    $sql_xm = 'select pid , pname from projectinfo where uid = '.$uid;
    $res_xm = mysqli_query($link , $sql_xm);
    //获取成员列表
    $sql_user = 'select user.uid , name from user , basicinfo where user.uid = basicinfo.uid and grade = 3';
    $res_user1 = mysqli_query($link , $sql_user);
    $res_user2 = mysqli_query($link , $sql_user);
    $res_user3 = mysqli_query($link , $sql_user);
    $res_user4 = mysqli_query($link , $sql_user);
    mysqli_close($link);
?>

<html>
<head>
    <link rel="stylesheet" href="css/renwufenpeiform.css" type="text/css">
</head>
<body>
    <div class="global">
        <h1 class="lable">分配任务</h1>
        <div class="content">
            <form action="renwufenpei.php" method="post">
                <div class="xm">
                    项目名称：<select name="pid" class="xmmc">
                        <option>--选择项目--</option>
                        <?php
                            while($row = mysqli_fetch_array($res_xm)) {
                                ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="con">
                    需求分析：
                    <?php
                        while($row2 = mysqli_fetch_array($res_user2)) {
                            ?>
                            <input type="checkbox" name="xq[]" value="<?php echo $row2[0]; ?>">
                            <span><?php echo $row2[1]; ?></span>
                            <?php
                        }
                    ?>
                </div>
                <div class="con">
                    系统设计：
                    <?php
                    while($row3 = mysqli_fetch_array($res_user3)) {
                        ?>
                        <input type="checkbox" name="sj[]" value="<?php echo $row3[0]; ?>">
                        <span><?php echo $row3[1]; ?></span>
                        <?php
                    }
                    ?>
                </div><div class="con">
                    编码实现：
                    <?php
                    while($row4 = mysqli_fetch_array($res_user4)) {
                        ?>
                        <input type="checkbox" name="sx[]" value="<?php echo $row4[0]; ?>">
                        <span><?php echo $row4[1]; ?></span>
                        <?php
                    }
                    ?>
                </div>
                <div class="con">
                    系统测试：
                    <?php
                    while($row1 = mysqli_fetch_array($res_user1)) {
                        ?>
                        <input type="checkbox" name="cs[]" value="<?php echo $row1[0]; ?>">
                        <span><?php echo $row1[1]; ?></span>
                        <?php
                    }
                    ?>
                </div>
                <div class="new3">
                    <input class="button1" type="submit" value="提  交">
                    <input class="button2" type="reset" value="取  消">
                </div>
            </form>
        </div>
    </div>
</body>
</html>