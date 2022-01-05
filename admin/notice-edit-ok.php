<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");

 $title=$_POST[title];
 $content=$_POST[content];
 $showtime=date("Y-m-d");

mysql_query("update school set title='$title',content='$content',time='$showtime' where id = '$id'",$conn);
echo "<script>alert('修改成功');window.location.href='mygood-edit.php';</script>";
?>