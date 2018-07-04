<?php
    $sql = 'select user.uid , name from user , basicinfo where grade="2" and user.uid = basicinfo.uid';
    include 'connection.php';
    $res = mysqli_query($link , $sql);
?>

<html>
<head>
    <title>项目发布 </title>
    <link rel="stylesheet" type="text/css" href="css/fabuprijectform.css" />
    <style>
        .file {
            position: relative;
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
            margin-top: 20px;
            margin-left: 10px;

        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }
        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="new" style="margin: 50px 100px;width: 60%;height:700px;border: 1px solid #ccc;padding: 10px;">
    <h1 class="lable">项目发布</h1>
    <form action="fabuproject.php" method="post" enctype="multipart/form-data">
        <div class="new1">
            项目名称：<input id="id" class="newid" type="text" name="pname">
        </div>
        <div class="new2">
            负&nbsp;责&nbsp;&nbsp;人：<select class="grade" name="uid">  <!-- 通过select的name获取select下option的value的值-->
                <option value="0"><==选择项目负责人==></option>
                <?php
                    while($row = mysqli_fetch_array($res)) {
                 ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                 <?php
                    }
                ?>
            </select>
        </div>
        <div class="new2">
            <font style="line-height: 150px; ">概&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</font><textarea class="jianjie" rows="10" name="jianjie"></textarea>
        </div>
        <div class="new2">
            完成时间：<input type="date" class="newid" name="endtime">
        </div>
        <div class="new2">
            相关材料：<!--<input style="vertical-align:middle;" type="file" class="newid" name="cailiao">-->
            <a href="javascript:;" class="file">选择文件
                <input type="file" name="cailiao" id="photo">
            </a>
        </div>
        <div class="new3">
            <input class="button1" type="submit" value="发  布">
            <input class="button2" type="reset" value="取  消">
        </div>
    </form>
</div>
</body>
</html>