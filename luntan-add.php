<?php
error_reporting(E_ALL || ~E_NOTICE); 
include('./fckeditor/fckeditor.php');
require_once("conn/conn.php");
session_start();
?>
<!DOCTYPE html>
<html> 
  <head>
    <meta charset="UTF-8">
    <title>帖子添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="images/css.css" type="text/css">
    <script language="javascript">//DOM树
      function checkform()
      {
        if(document.forms["frm"].elements["title"].value=="")
           {
            alert("标题不能为空");
            document.forms["frm"].elements["title"].focus();
            return false;
            }
    
        if (eWebEditor1.getHTML()==""){
            alert("内容不能为空！");
            return false;
          }
        if(document.forms["frm"].elements["source"].value=="")
          {
            alert("来源不能为空");
            document.forms["frm"].elements["source"].focus();
            return false;
          }
            return true;
          }
      function getimg()
      {
        path=frm.newspic.value
        tupian.innerHTML="<img src='"+path+"' />"
      }
  </script>
  </head>
  
<body>
<?php
  if($_POST["Submit"])
  {
    $ctype=$_POST["type"];
    $title=$_POST["title"];
    $content=$_POST["d_content"];
    $root=$_SERVER['DOCUMENT_ROOT'];
    $foldername=date("Y-m-d");
    $folderpath=$root."/news/".$foldername;
    $showtime=date("Y-m-d H:i:s");
    $uname="$_SESSION[username]";
    $phone=$_POST["phone"];
    $school=$_POST["school"];

    if(!file_exists($folderpath))
    {
      mkdir($folderpath);
    }
    $filename=date("H-i-s").".html";
    $filepath=$folderpath."/".$filename;
    if(!file_exists($filepath))
    {
      $sql="select * from lytype where name=$type";
      $rs=mysql_query($sql);
      $rows=mysql_fetch_assoc($rs);
      $type=$rows["name"];
      $mobanpath=$root."/moban/moban.html";
      $fp=fopen($mobanpath,"r");   
      $str=fread($fp,filesize($mobanpath));//读出模板
      fclose($fp);
      $str=str_replace("{-type-}",$type,$str);
      $str=str_replace("-title-",$title,$str);
      $str=str_replace("-keywords-",$keywords,$str);
      $str=str_replace("-phone-",$phone,$str);
      $str=str_replace("-school-",$school,$str);
      $str=str_replace("-description-",$description,$str);
      $str=str_replace("-time-",$time,$str);
      $str=str_replace("-content-",$content,$str);
      $str=str_replace("-source-",$source,$str);
      //把替换好的内容写入文件
      $fp=fopen($filepath,"w");
      fwrite($fp,$str);
      fclose($fp);
      $filepath=$foldername."/".$filename;
      $sql="insert into luntan(title,type,content,addtime,uname,phone,school) values ('$title','$ctype','$content','$showtime','$uname','$phone','$school')";
      if(mysql_query($sql))
      {
      ?>
      <script>if (confirm('添加成功！是否继续添加？\n\n继续添加  返回查看')){window.location='luntan-add.php'}else {window.location='luntan-add.php'} </script>
      <?php
      }
      else
      {
      ?>
      <script>if (confirm('添加失败！是否继续添加？\n\n继续添加  返回查看')){window.location='luntan-add.php'}else {window.location='luntan-add.php'} </script>
      <?php
      }
    }
    exit();
  }
?>
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data" onsubmit="return checkform()">
  <label>标题：</label>
  <input name="title" type="text" id="title" size="45" /><br><br>
  <label>学校：</label>
  <input name="school" type="text" id="school" size="45" /><br><br>
  <label>联系方式：</label>
  <input name="phone" type="text" id="phone" size="45" /><br><br>
  <label>类别：</label>
      <?php
      $sql="select * from lttype";
      $rs=mysql_query($sql);
    ?>
        <select name="type" id="type">
    <?php
      while($rows=mysql_fetch_assoc($rs))
      {
      ?>
      <option><?php echo $rows["name"] ?></option>
      <?php
      }
    ?>
        </select><br><br>
  <label>内容：</label><br><br>
    <?php
      $sBasePath = $_SERVER['PHP_SELF'] ;
      $sBasePath = dirname($sBasePath).'/fckeditor/';
      $aFCKeditor = new FCKeditor('d_content') ;
      $aFCKeditor->Width="750px";                   //设置它的宽度 
      $aFCKeditor->Height="500px";                 //设置它的高度 
      $aFCKeditor->BasePath=$sBasePath;
      $aFCKeditor->Create();
    ?>
    <input type="submit" name="Submit" value="提交" />
    <input type="reset" name="Submit2" value="重置" />
</form>
</body>

</html>