<?php  
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")  
    {  
         $userid=$_POST[userid];
 		 $name=$_POST[name];
 		 $school=$_POST[school];
 		 $phone=$_POST[phone];
 		 $pwd=md5($_POST["pwd"]);
 		 $repwd=md5($_POST[repwd]);
 		 $showtime=date("Y-m-d");  
        if($userid == "" || $name == ""|| $school == ""|| $phone == ""|| $pwd == "" || $repwd == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        }  
        else  
        {  
            if($pwd == $repwd)  
            {  
                mysql_connect("localhost","root","");   //连接数据库  
                mysql_select_db("db_buy");  //选择数据库  
                mysql_query("set names utf8"); //设定字符集  
                $sql = "select name from user where name = '$_POST[name]'"; //SQL语句  
                $result = mysql_query($sql);    //执行SQL语句  
                $num = mysql_num_rows($result); //统计执行结果影响的行数  
                if($num)    //如果已经存在该用户  
                {  
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称  
                {  
                    $sql_insert = "insert into user (userid,name,school,phone,pwd,addtime) values('$userid','$name','$school','$phone','$pwd','$showtime')";  
                    $res_insert = mysql_query($sql_insert);  
                    //$num_insert = mysql_num_rows($res_insert);  
                    if($res_insert)  
                    {  
                        echo "<script>alert('注册成功！'); history.go(-1);</script>";  
                    }  
                    else  
                    {  
                        echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>  