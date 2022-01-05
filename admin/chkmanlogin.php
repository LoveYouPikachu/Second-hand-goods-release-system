<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
$A_name = $_POST[username];
$A_pwd = $_POST[pwd];

class chkinput{
  var $name;
  var $pwd;

function chkinput($x,$y){
  $this->name = $x;
  $this->pwd = $y;
}

function checkinput(){
  include("conn/conn.php");
  $sql = mysql_query("select * from manager where name = '".$this->name."' and pwd = '".$this->pwd."'",$conn);
  $info = mysql_fetch_array($sql);
  if($info == false){
    echo "<script language='javascript'>alert('您输入的用户名或者密码有误请重新输入');history.back();</script>";
    exit;
  }
  else{
      echo "<script>alert('登录成功!');window.location='index.php';</script>";
      session_start();
      $_SESSION[username]=$info[name];
    session_register("producelist");
    $producelist="";
    session_register("quatity");
    $quatity="";
        /*header("location:index.php");*/
        exit;
  }
          }
      }
  $obj = new chkinput(trim($A_name),trim($A_pwd));
  $obj ->checkinput();
?>