<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="user-add.php"; 

 $userid=$_POST[id];
 $username=$_POST[name];
 $pass=$_POST[pwd];
 $showtime=date("Y-m-d");

 mysql_query("insert into user (userid,name,pwd,addtime) 
 	values ('$userid','$username','$pass','$showtime')",$conn);
 echo '<script>alert("提交成功！");location.href="'.$url.'"</script>'; 
?>