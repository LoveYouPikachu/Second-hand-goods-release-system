<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");


$title=$_POST[title];
$content=$_POST[content];
$price=$_POST[price];
$school=$_POST[school];
$phone=$_POST[uphone];
$goodtype=$_POST[type];
$showtime=date("Y-m-d H:i:s");
$hurry=$_POST[hurry];
$carry=$_POST[carry];
$uname=$_POST[uname];

function getname($exname){
   $dir = "upimages/";
   $i=1;
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   
   while(true){
       if(!is_file($dir.$i.".".$exname)){
         $name=$i.".".$exname;
         break;
     }
     $i++;
   }

   return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
$uploadfile = getname($exname);

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))
 { 
  $uploadfile="./".$uploadfile;
}
else
 {
  $uploadfile="";
 }

mysql_query("insert into shangpin(title,content,school,type,tupian,price,uphone,addtime,hurry,carry,uname)values('$title','$content','$school','$goodtype','$uploadfile','$price','$phone','$showtime','$hurry','$carry','$uname')",$conn);
echo "<script>alert('发布成功');window.location.href='fabu.php';</script>";
?>