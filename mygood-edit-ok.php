<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");
if(is_numeric($_POST[price])==false)
 {
   echo "<script>alert('价格只能为数字！');history.back();</script>";
   exit;
 }
$title=$_POST[title];
$content=$_POST[content];
$price=$_POST[price];
$school=$_POST[school];
$phone=$_POST[uphone];
$goodtype=$_POST[type];
$showtime=date("Y-m-d");
$hurry=$_POST[hurry];
$carry=$_POST[carry];
$uname=$_POST[uname];
$id=$_POST[id];

function getname($exname){
   $dir = "upimages/";//文件名从1开始
   $i=1; //如果目录 upimages 不存在则创建目录
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   
   while(true){
       if(!is_file($dir.$i.".".$exname)){//尝试文件名, 如果文件名存在就继续尝试, 一直到文件名不存在
         $name=$i.".".$exname;
         break;
     }
     $i++;
   }

   return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));//把所有字符转换为小写：   查找 在字符串中最后一次出现的位置
$uploadfile = getname($exname);

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))//去掉空格
 { 
  $uploadfile="./".$uploadfile;
}
else
 {
  $uploadfile="";
 }

mysql_query("update shangpin set title='$title',content='$content',school='$school',type='$goodtype',tupian='$uploadfile',price='$price',uphone='$phone',addtime='$showtime',hurry='$hurry',carry='$carry' where id = '$id'",$conn);
echo "<script>alert('修改成功');window.location.href='mygood-edit.php';</script>";
?>