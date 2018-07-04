<?php
    session_start();
    $grade = $_SESSION['grade'];
    $key = $_GET['key'];
    include 'connection.php';
    $sql = 'select user.uid , grade , name , sex , sage , worktype, phone from user , basicinfo , contactinfo  where user.uid = contactinfo.uid and user.uid = basicinfo.uid';
    if($key != '') {
        $sql = $sql . ' and name="'.$key.'"';//给sql增加where条件，key限制条件。
    }
    $res = mysqli_query($link , $sql);
?>

<html>
<head>
    <link rel="stylesheet" href="css/userlist.css">
</head>
<body>
    <!--全局-->
    <div class="global">
        <!--顶部搜索块-->
        <div class="_top">
            <form action="userlist.php" method="get">
                <span class="lable">成员姓名：</span>
                <input class="input" type="text" name="key">
                <button class="but" type="submit">搜索</button>
            </form>
        </div>
        <!--下部成员列表块-->
        <div class="list">
            <table class="l_table">
                <tr>
                    <td width="170px" class="l_td">ID</td>
                    <td width="200px" class="l_td">姓名</td>
                    <td width="65px;" class="l_td">等级</td>
                    <td width="65px" class="l_td">性别</td>
                    <td width="65px" class="l_td">年龄</td>
                    <td width="200px" class="l_td">联系方式</td>
                    <td width="60px;" class="l_td">状态</td>
                    <td width="130px;" class="l_td">操作</td>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($res)) {
                        ?>
                        <tr class="l_tr">
                            <td style="text-align: center;padding: 0;" width="170px"
                                class="l_t"><?php echo $row[0]; ?></td>
                            <td width="200px" class="l_t"><?php echo $row[2]; ?></td>
                            <td width="65px;" class="l_t"><?php echo $row[1]; ?></td>
                            <td width="65px" class="l_t"><?php echo $row[3]; ?></td>
                            <td width="65px" class="l_t"><?php echo $row[4]; ?></td>
                            <td width="200px" class="l_t"><?php echo $row[6]; ?></td>
                            <td width="60px;" class="l_t"><?php echo $row[5]; ?></td>
                            <td width="130px;" style="text-align: center; color: #2a9cdd;" class="l_t">
                                <a
                                        style="text-decoration:none;" href="chakanpersoninfo.php?uid=<?php echo $row[0];?>">查看</a>  <a
                                        style="text-decoration:none;display: <?php echo $grade==3?'none':'inline'; ?>" href="alterpersoninfoform.php?uid=<?php echo $row[0];?>">修改</a>&nbsp;&nbsp;<a
                                        style="text-decoration:none;display: <?php echo $grade==1?'inline':'none'; ?>" href="deleteuser.php?uid=<?php echo $row[0];?>">删除</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>