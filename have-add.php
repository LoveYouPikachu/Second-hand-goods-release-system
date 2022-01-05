<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
 include("conn/conn.php");
 $url="have.php"; 
 $phone="$_POST[phone]";
 $content="$_POST[content]";
 $fname="$_POST[fname]";
 $jname="$_POST[jname]";
 $title="$_POST[title]";
 $type="$_POST[type]";
 $showtime=date("Y-m-d");
 mysql_query("insert into have (phone,content,fname,title,addtime,jname,type)values ('$phone','$content','$fname','$title','$showtime','$jname','$type') ",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("操作成功！");location.href="'.$url.'"</script>'; 