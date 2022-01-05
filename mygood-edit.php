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
    <title>闲置修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
</script>
  <script type="text/javascript">
      function chkinput(form){
          if(form.title.value == ""){
            alert("请输入商品的类型或者品牌");
            form.title.select();
            return(false);
          }
          if (form.content.value == "") {
            alert("请输入商品的描述");
            form.content.select();
            return(false);
          }
          if (form.xiaoqu.value == "") {
            alert("请输入商品所在校区");
            form.xiaoqu.select();
            return(false);
          }
          if (form.price.value == "") {
            alert("请输入商品的价格");
            form.price.select();
            return(false);
          } 
        return(true);
      }
  </script>  </head>
  
  <body>
    <div class="x-body">
    <?php
         $sql=mysql_query("select* from shangpin where id=$_GET[id]",$conn);
         $info=mysql_fetch_array($sql);
       ?>
        <form class="layui-form" method="post" action="mygood-edit-ok.php" enctype="multipart/form-data">
           <div class="layui-form-item">
              <label for="title" class="layui-form-label">
                  <span class="x-red">*</span>标题：</label>
              <div class="layui-input-inline">
                  <input type="text" id="title" name="title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo "$info[title]";  ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="content" class="layui-form-label">
                  <span class="x-red">*</span>描述：</label>
              <div class="layui-input-inline">
              <textarea id="content"  name="content" class="layui-input" ><?php echo "$info[content]";  ?></textarea>
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
              <?php
         $sql=mysql_query("select* from shangpin where id=$_GET[id]",$conn);
         $info=mysql_fetch_array($sql);
       ?>
              <label for="price" class="layui-form-label">
                  <span class="x-red">*</span>价格$：</label>
              <div class="layui-input-inline">
                  <input type="text" id="price" name="price"  class="layui-input" value="<?php echo "$info[price]";  ?>" >
              </div>
          </div>
          <div class="layui-form-item">
              <?php
         $sql=mysql_query("select* from shangpin where id=$_GET[id]",$conn);
         $info=mysql_fetch_array($sql);
       ?>
              <label for="uphone" class="layui-form-label">
                  <span class="x-red">*</span>联系方式：</label>
              <div class="layui-input-inline">
                  <input type="text" id="uphone" name="uphone" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo "$info[uphone]";  ?>">
                  <input type="hidden" name="uname" value="<?php echo $_SESSION[username];?>">
                  <input type="hidden" name="id" value="<?php echo $_GET[id];?>">
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
                  确认修改
              </button>
          </div>
      </form> 
    </div>
    <script>
      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;
      
        //自定义验证规则
        form.verify({
          nikename: function(value){
            if(value.length < 5){
              return '昵称至少得5个字符啊';
            }
          }
          ,pass: [/(.+){6,12}$/, '密码必须6到12位']
          ,repass: function(value){
              if($('#L_pass').val()!=$('#L_repass').val()){
                  return '两次密码不一致';
              }
          }
        });

        //监听提交
        form.on('submit(add)', function(data){
          console.log(data);
          //发异步，把数据提交给php
          layer.alert("增加成功", {icon: 6},function () {
              // 获得frame索引
              var index = parent.layer.getFrameIndex(window.name);
              //关闭当前frame
              parent.layer.close(index);
          });
          return false;
        });
        
        
      });
  </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>