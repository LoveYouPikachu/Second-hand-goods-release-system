<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");

$upfile=$_POST[upfile];
$addtime=date("Y-m-j");

function getname($exname){
   $dir = "uplunbo/";
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

mysql_query("insert into lunbotu(tupian,addtime)values('$uploadfile','$addtime')",$conn);
echo "<script>alert('添加成功!');window.location.href='addlunbotu.php';</script>";
?>