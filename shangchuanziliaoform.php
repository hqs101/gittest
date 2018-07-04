<?php
    include 'connection.php';
    $sql = 'select projectinfo.pid , pname from projectinfo where pstatus = "on"';
    $res = mysqli_query($link , $sql);
    mysqli_close($link);
?>

<html>
<head>
    <link rel="stylesheet" href="css/shangchuanziliaoform.css" type="text/css">
    <script>
        function show(){
            var type = document.getElementById('ziliaotype').value;
            if(type == '项目文档'){
                document.getElementById('hides').style.display = 'inline-block';//显示项目名下拉框
                document.getElementById("addbut").disabled=true;//addbutton失效
                document.getElementById("addbut").style.backgroundColor = '#3d3d3d';
                var files = document.getElementsByName('aboutfile[]');//获取文件域数组
                while(files.length!=1){
                    for(var $i = 0 ; $i < files.length-1 ; $i++){
                        files[$i].parentNode.removeChild(files[$i]);//如果之前选的不是项目文档，则循环循环删除之前添加的多余的input,只上传一个项目类型的文档
                    }
                }
            }else{
                document.getElementById('hides').style.display = 'none';
                document.getElementById("addbut").disabled=false;
                document.getElementById("addbut").style.backgroundColor = '#3695cc';
            }
        }

        function  add() {
            var file = document.getElementById('ff');
            var inputfile = document.createElement('input');
            var br = document.createElement('br');//换行
            inputfile.type = 'file';//设置input是文件类型
            inputfile.name = 'aboutfile[]';//设置input名
            inputfile.className = 'addfile'//设置input类选择器
            file.appendChild(inputfile);
            inputfile.appendChild(br);//在input后添加换行
        }
    </script>
</head>
<body>
<div class="global" style="margin: 60px 100px;width: 60%;height: 500px;border: 1px solid #ccc;padding: 10px;">
    <h1 style="font-size: 21px;color: #47a4e1;font-family: 'Microsoft YaHei'; margin-left: 10px;" class="lable">资源上传</h1>
    <form action="shangchuanziliao.php" method="post" enctype="multipart/form-data">
        <div class="new2">
            类型：<select id="ziliaotype" class="grade" name="ntype" onchange="show()"><!-- select值改变触发show函数-->
                <option value="技术文档">技术文档</option>
                <option value="项目文档">项目文档</option>
                <option value="团队文档">团队文档</option>
            </select>
        </div>
        <div class="new2" id="hides" style="display: none;">
            项目：<select class="grade" name="pid">
                <option value="0">== 选择项目 ==</option>
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
            文件：<input class="aboutfile" type="file" name="aboutfile[]">
        </div>
        <div id="ff">

        </div>
        <div class="new2">
            <input id="addbut" class="buttonadd" type="button" onclick="add()"  style="font-size: 18px;" value="添加">
        </div>
        <div class="new3">
            <input class="button1" type="submit" value="上  传">
            <input class="button2" type="reset" value="取  消">
        </div>
    </form>
</div>
</body>
</html>