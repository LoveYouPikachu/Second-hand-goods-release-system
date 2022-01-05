<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="school-add.php"; 
 $name=$_POST[sname];
 $address=$_POST[saddress];
 $phone=$_POST[sphone];
 $showtime=date("Y-m-d");
 mysql_query("insert into school (sname,saddress,sphone,time) values ('$name','$address','$phone','$showtime')",$conn);
 echo '<script>alert("提交成功！");location.href="'.$url.'"</script>'; 
?>