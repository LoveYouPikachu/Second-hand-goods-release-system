<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");

$name=$_POST[name];
$pwd=$_POST[pwd];
// $id=$_POST[id];
$id=1;
mysql_query("update manager set name='$name',pwd='$pwd' where id ='$id',$conn");
echo "<script>alert('修改成功');</script>";

?>