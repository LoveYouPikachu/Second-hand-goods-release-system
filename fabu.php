<?php
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
   if($_SESSION[username] == ""){
      echo "<script>alert('您还没有登录,请先登录!');window.location.href='userlogin.php';</script>";
      exit;
   }
   include("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新疆大学二手发布平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="./css/font.css">
<link rel="stylesheet" href="./css/xadmin.css">
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/xadmin.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
  <script type="text/javascript">
      function chkinput(form){
          if(form.title.value == ""){
            alert("请输入商品的名称");
            form.title.select();
            return(false);
          }
          if (form.content.value == "") {
            alert("请输入商品的描述");
            form.content.select();
            return(false);
          }
          if (form.school.value == "") {
            alert("请输入商品所在校区");
            form.school.select();
            return(false);
          }
          if (form.price.value == "") {
            alert("请输入商品的价格");
            form.price.select();
            return(false);
          } 
        return(true);
      }
  </script>
</head>

<body>
<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">
    <div id="templatemo_header">
        <div id="site_title"><h1><a href="#">新疆大学二手发布平台</a></h1></div>
        <div style="left: 600px; position: absolute; top: 90px;">
          <p><a href="#">用 户 名:&nbsp;&nbsp;<?php echo $_SESSION[username]; ?></a> </p>
    </div>
        <div class="cleaner"></div>
    </div> 
    
    <div id="templatemo_menubar">
        <div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" >首页</a></li>
                <li><a href="fabu.php" class="selected">发布闲置</a></li>
                <li><a href="mygoods.php">我的闲置</a></li>
                <li><a href="luntan.php">闲置求购</a></li>
                <li><a href="shoppingcart.php">我的收藏</a></li>
                <li><a href="myinfo.php">我的消息</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="search.php" method="post">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
        <div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>系统通知</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                    <?php
                      $sql=mysql_query("select * from notice",$conn);
                        while($info=mysql_fetch_array($sql))
                      {
                        ?>
                        <li class="first"><a title="have"  onclick="x_admin_show('have','notice.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;"><?php echo $info[title];?></a></li><?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div id="content" class="float_r">
        	<h2>您当前的位置：闲置发布</h2>
          <div class="x-body">
        <form class="layui-form" method="post" action="savegoods.php" enctype="multipart/form-data" role="form" onSubmit="return chkinput(this)">
           <div class="layui-form-item">
              <label for="title" class="layui-form-label">
                  <span class="x-red">*</span>标题：</label>
              <div class="layui-input-inline">
                  <input type="text" id="title" name="title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="content" class="layui-form-label">
                  <span class="x-red">*</span>描述：</label>
              <div class="layui-input-inline">
              <textarea name="content" class="layui-input"> </textarea>
              </div>
          </div>

          <div class="layui-form-item">
              <label for="school" class="layui-form-label">
                  <span class="x-red">*</span>学校：</label>
              <div class="layui-input-inline">
                  <select class="form-control" name="school">
                      <?php
                        $sql=mysql_query("select * from school",$conn);
                        while($info=mysql_fetch_array($sql))
                          {
                            ?>
                  <option><?php echo "$info[sname]"; ?></option>
                      <?php } ?>
                  </select>
              </div>
          </div>

          <div class="layui-form-item">
              <label for="type" class="layui-form-label">
                  <span class="x-red">*</span>类别：</label>
              <div class="layui-input-inline">
                  <select class="form-control" name="type">
            <?php
            $sql=mysql_query("select * from type",$conn);
              while($info=mysql_fetch_array($sql))
                {
                ?>
        <option><?php echo "$info[name]"; ?></option>
        <?php } ?>
      </select> 
              </div>
          </div>
          <div class="layui-form-item">
             <label for="price" class="layui-form-label">
                  <span class="x-red">*</span>添加照片：</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
              <input type="file" name="upfile" class="inputcss" size="30" id="upfile" style="width:150px;" >
          </div>
          <div class="layui-form-item">
              <label for="price" class="layui-form-label">
                  <span class="x-red">*</span>价格$：</label>
              <div class="layui-input-inline">
                  <input type="text" id="price" name="price"  class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="uphone" class="layui-form-label">
                  <span class="x-red">*</span>联系方式：</label>
              <div class="layui-input-inline">
                  <input type="text" id="uphone" name="uphone" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
                  <input type="hidden" name="uname" value="<?php echo $_SESSION[username];?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="uphone" class="layui-form-label">
                  <span class="x-red">*</span>是否为紧急出售：</label>
              <div class="layui-input-inline">
                  <select class="form-control" name="hurry">
                  <option>是</option>
                  <option>否</option>
                  </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="uphone" class="layui-form-label">
                  <span class="x-red">*</span>取货方式：</label>
              <div class="layui-input-inline">
                  <select class="form-control" name="carry">
                  <option>送货上门</option>
                  <option>自提</option>
                  </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="save" lay-submit="">
                  确认发布
              </button>
          </div>
      </form>
    </div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
     <div id="templatemo_footer">
      

      Copyright © 2020 <a href="#">新疆大学 计信学院 尹杰</a> 
        
    </div> 
    </div> 
    </div> 
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
</body>
</html>