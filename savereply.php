<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
 include("conn/conn.php");
 $url="productdetail.php"; 
 $name="$_POST[sname]";
 $rtype="$_POST[type]";
 $uname="$_SESSION[username]";
 $cont="$_POST[content]";
 mysql_query("insert into reply (content,uname,type,sname)values ('$cont','$uname','$rtype','$name') ",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("回复成功！");location.href="'.$url.'"</script>'; 