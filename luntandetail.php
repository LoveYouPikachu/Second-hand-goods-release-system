<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
    if($_SESSION[username] == ""){
      echo "<script>alert('您还没有登录,请先登录!');window.location.href='userlogin.php';</script>";
      exit;
   }
   include("conn/conn.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>求购详情界面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>

  </head>
  
  <body>
    <div class="x-body">
    <?php $sql=mysql_query("select * from luntan where id='".$_GET[id]."' order by id desc limit 0,7",$conn);
                    while($info=mysql_fetch_array($sql))
                    { ?>
        <form class="layui-form">
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red">*</span>标题
              </label>
              <textarea rows="3" cols="60"><?php echo $info[title] ?></textarea>
          </div>
          <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>详情
              </label>
              <textarea rows="8" cols="60"><?php echo $info[content] ?></textarea>
          </div>
                    <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>学校
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="pass" class="layui-input" value="<?php echo $info[school] ?>">
              </div>
          </div>
                    <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>发布时间
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="pass" class="layui-input" value="<?php echo $info[addtime] ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
                  <span class="x-red">*</span>联系方式
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="repass" class="layui-input" value="<?php echo $info[phone] ?>">
              </div>
          </div>
      </form> <?php } ?>
    </div>
  </body>

</html>