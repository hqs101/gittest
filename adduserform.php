<html>
<head>
    <title>添加用户 </title>
    <link rel="stylesheet" type="text/css" href="css/newuser.css" />
    <script language="JavaScript">
        function check(){
            var reg = new RegExp('^[1,2,3][0-9]{3}$');
            var text = document.getElementById('id').value;
            if(!reg.test(text)){
                alert("用户ID格式不正确");
                document.getElementById('id').focus();

                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="new">
        <h1 class="lable">添加新用户</h1>
        <form action="adduser.php" method="post" onsubmit="return check();">
            <div class="new1">
                用户ID：<input id="id" class="newid" type="text" name="newuid">
            </div>
            <div class="new2">
                权&nbsp;&nbsp;&nbsp;限：<select class="grade" name="grade">
                    <option value="3">成员</option>
                    <option value="2">项目负责人</option>
                </select>
            </div>
            <div class="new3">
                <input class="button1" type="submit" value="添  加">
                <input class="button2" type="reset" value="取  消">
            </div>
        </form>
    </div>
</body>
</html>