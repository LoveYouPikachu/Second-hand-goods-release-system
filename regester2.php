<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册界面</title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    </script>
    <script type="text/javascript">
      function chkinput(form){
          if(form.userid.value == ""){
            alert("请输入学号");
            form.userid.select();
            return(false);
          }
          if (form.name.value == "") {
            alert("请输入姓名");
            form.name.select();
            return(false);
          }
          if (form.school.value == "") {
            alert("请输入学校");
            form.school.select();
            return(false);
          }
          if (form.phone.value == "") {
            alert("请输入联系方式");
            form.phone.select();
            return(false);
          } 
        return(true);
      }
    </script>
</head>
<body class="login_bj" >

<div class="zhuce_body">
	<div class="logo"></div>
    <div class="zhuce_kong">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>欢迎注册</h3>
       	  	  <form action="userzhuce.php" method="post" role="form" onSubmit="return chkinput(this)">
                <input name="userid" type="text" class="kuang_txt phone" placeholder="学号">
                <input name="name" type="text" class="kuang_txt email" placeholder="姓名">
                <input name="school" type="text" class="kuang_txt email" placeholder="学校">
                <input name="phone" type="text" class="kuang_txt email" placeholder="联系方式">
                <input name="pwd" type="password" class="kuang_txt possword" placeholder="密码">
                <input name="repwd" type="password" class="kuang_txt possword" placeholder="再次输入密码">
                <input type="Submit" class="btn_zhuce" name="Submit" value="注册">
                
                </form>
            </div>

        </div>
        
    </div>

</div>
    


</body>
</html>