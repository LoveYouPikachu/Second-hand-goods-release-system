<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新疆大学二手发布平台</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/awesome.min.css">
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <script type="text/javascript">   

    <script language="javascript">
    function x_admin_show(title,url,w,h){
    if (title == null || title == '') {
        title=false;
    };
    if (url == null || url == '') {
        url="404.html";
    };
    if (w == null || w == '') {
        w=($(window).width()*0.9);
    };
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        area: [w+'px', h +'px'],
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        shade:0.4,
        title: title,
        content: url
    });
}
/*关闭弹出框口*/
function x_admin_close(){
    var index = parent.layer.getFrameIndex(window.name);
    parent.layer.close(index);
}
    </script>
	<script type="text/javascript">
		function chkinput(form){
			if(form.name.value == ""){
				alert("请输入用户名");
				form.userid.select();
				return(false);
			}
			if(form.pwd.value ==""){
				alert("请输入您的密码");
				form.pwd.select();
				return(false);
			}
			return(true);
		}
	</script>
	<style type="text/css">
    .form-horizontal{
        background: #fff;
        padding-bottom: 40px;
        border-radius: 15px;
        text-align: center;
    }
    .form-horizontal .heading{
        display: block;
        font-size: 35px;
        font-weight: 700;
        padding: 35px 0;
        border-bottom: 1px solid #f0f0f0;
        margin-bottom: 30px;
    }
    .form-horizontal .form-group{
        padding: 0 40px;
        margin: 0 0 25px 0;
        position: relative;
    }
    .form-horizontal .form-control{
        background: #f0f0f0;
        border: none;
        border-radius: 20px;
        box-shadow: none;
        padding: 0 20px 0 45px;
        height: 40px;
        transition: all 0.3s ease 0s;
    }
    .form-horizontal .form-control:focus{
        background: #e0e0e0;
        box-shadow: none;
        outline: 0 none;
    }
    .form-horizontal .form-group i{
        position: absolute;
        top: 12px;
        left: 60px;
        font-size: 17px;
        color: #c8c8c8;
        transition : all 0.5s ease 0s;
    }
    .form-horizontal .form-control:focus + i{
        color: #00b4ef;
    }
    .form-horizontal .fa-question-circle{
        display: inline-block;
        position: absolute;
        top: 12px;
        right: 60px;
        font-size: 20px;
        color: #808080;
        transition: all 0.5s ease 0s;
    }
    .form-horizontal .fa-question-circle:hover{
        color: #000;
    }
    .form-horizontal .main-checkbox{
        float: left;
        width: 20px;
        height: 20px;
        background: #11a3fc;
        border-radius: 50%;
        position: relative;
        margin: 5px 0 0 5px;
        border: 1px solid #11a3fc;
    }
    .form-horizontal .main-checkbox label{
        width: 20px;
        height: 20px;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    .form-horizontal .main-checkbox label:after{
        content: "";
        width: 10px;
        height: 5px;
        position: absolute;
        top: 5px;
        left: 4px;
        border: 3px solid #fff;
        border-top: none;
        border-right: none;
        background: transparent;
        opacity: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .form-horizontal .main-checkbox input[type=checkbox]{
        visibility: hidden;
    }
    .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
        opacity: 1;
    }
    .form-horizontal .text{
        float: left;
        margin-left: 7px;
        line-height: 20px;
        padding-top: 5px;
        text-transform: capitalize;
    }
    .form-horizontal .btn{
        float: right;
        font-size: 14px;
        color: #fff;
        background: #00b4ef;
        border-radius: 30px;
        padding: 10px 25px;
        border: none;
        text-transform: capitalize;
        transition: all 0.5s ease 0s;
    }
    @media only screen and (max-width: 479px){
        .form-horizontal .form-group{
            padding: 0 25px;
        }
        .form-horizontal .form-group i{
            left: 45px;
        }
        .form-horizontal .btn{
            padding: 10px 20px;
        }
    }
  </style>
</head>
<body>
	<div class="demo" style="padding: 20px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
        &nbsp;&nbsp;<button class="btn btn-default" onclick="x_admin_show('注册','regester1.php',600,400)">注册</button>
          <form class="form-horizontal" action="userchklogin.php" method="post" role="form" onSubmit="return chkinput(this)">
            <span class="heading">用户登录</span>
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="请输入您的用户名">
            </div>
            <div class="form-group help">
              <input type="password" class="form-control" name="pwd" placeholder="请输入您的密码">
            </div>
            <div class="form-group">
              <div class="main-checkbox">
                <input type="checkbox" value="None" id="checkbox1" name="check"/>
                <label for="checkbox1"></label>
              </div>
              <span class="text">记住密码</span>
              <button type="submit" class="btn btn-default">登录</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>