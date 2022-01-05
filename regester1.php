<span style="font-family: 'Microsoft YaHei'; font-size: 16px;"><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新疆大学二手发布平台</title>
  <link rel="stylesheet" href="css/bootstrap2.min.css">
  <link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="jquery.min.js"></script>
</head>
    
<body>
  <form action="reg.php" method="post">
    手机号：<input type="text" name="tel" id="tel"><br>
    <input type="hidden" name="test" value="5568">
    验证码：<input type="text" name="verify" id=""><span><button id="btn" type="button">发送验证码</button></span><br>
    <input type="submit" name="" value="注册"> 
  </form>
  <script type="text/javascript">
    $('#btn').click(function(){
      var tel = $.trim($('#tel').val());
      $.post('SendTemplateSMS.php', {'tel':tel},function(res){
        if (res) {
          alert('发送成功');
        } else {
          alert('发送失败');
        }
      });
    });
  </script>
</body>
</html> 
</span>
