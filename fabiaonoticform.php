<?php
include 'connection.php';
$Sql = 'select pname,pid from projectinfo';
$res = mysqli_query($link,$Sql);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/fabiaonoticform.css" />
    <script>
        function show(){
            var type = document.getElementById('notictype').value;
            if(type == '项目公告')
                document.getElementById('hides').style.display = 'inline-block';
            else
                document.getElementById('hides').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="global" style="margin: 50px 100px;width: 60%;height: 600px;border: 1px solid #ccc;padding: 10px;">
        <h1 style="font-size: 21px;color: #47a4e1;font-family: 'Microsoft YaHei'; margin-left: 10px;" class="lable">公告发布</h1>
        <form action="fabiaonotice.php" method="post" enctype="multipart/form-data">
            <div class="new1">
                标题：<input id="id" class="newid" type="text" name="nname">
            </div>
            <div class="new2">
                类型：<select id="notictype" class="grade" name="ntype" onchange="show()">
                    <option value="团队新闻">团队新闻</option>
                    <option value="项目公告">项目公告</option>
                    <option value="团队公告">团队公告</option>
                    <option value="会议通知">会议通知</option>
                </select>
            </div>
            <div class="new2" id="hides" style="display: none;">
                项目：<select class="grade" name="ptype">
                    <option value="1">选择项目</option>
                    <?php
                        while($row = mysqli_fetch_array($res)) {
                            ?>
                            <option value="<?php echo $row[1];?>"><?php echo $row[0];?></option>
                            <?php
                        }
                        ?>
                </select>
            </div>
            <div class="new2">
                 内容：<textarea class="jieshao"  rows="10" name="content" id="content" >
                </textarea>
            </div>
            <!--<div class="new2">
                文件：<input class="aboutfile" type="file" name="aboutfile">
            </div>-->
            <div class="new3">
                <input class="button1" type="submit" value="发  布">
                <input class="button2" type="reset" value="重  置" onclick="show()">
            </div>
        </form>
    </div>
</body>
</html>