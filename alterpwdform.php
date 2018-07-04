<html>
<head>
    <title>修改密码 </title>
    <link rel="stylesheet" type="text/css" href="css/newuser.css" />
    <script language="JavaScript">
        function check(){
            var $newpwd1 = document.getElementById('pwd1').value;
            var $newpwd2 = document.getElementById('pwd2').value;
            if($newpwd1 == ''){
                document.getElementById('pwd1').focus();
                return false;
            }
            if($newpwd2 == ''){
                document.getElementById('pwd2').focus();
                return false;
            }
            if($newpwd2 !== $newpwd1){
                document.getElementById('pwd2').value = '';
                document.getElementById('pwd1').value = '';
                document.getElementById('pwd1').focus();
                alert('密码不一致');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="new">
    <h1 class="lable">修改密码</h1>
    <form action="alterpwd.php" method="post" onsubmit="return check();">
        <div class="new1">
            &nbsp;&nbsp;&nbsp;新密码：<input id="pwd1" class="newid" type="password" name="pwd1">
        </div>
        <div class="new1">
            确认密码：<input id="pwd2" class="newid" type="password" name="pwd2">
        </div>
        <div class="new3">
            <input class="button1" type="submit" value="提  交">
            <input class="button2" type="reset" value="取  消">
        </div>
    </form>
</div>
</body>
</html>