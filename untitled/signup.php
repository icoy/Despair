<?php
header("Content-Type: text/html; charset=utf8");

if(!isset($_POST['submit']))
{
    exit("ERROR");
}//判断是否有submit操作

$name=$_POST['name'];//post获取表单里的name
$password=$_POST['password'];//post获取表单里的password

include('connect.php');//链接数据库
$q="insert into user(id,username,password) values (null,'$name','$password')";//向数据库插入表单传来的值的sql
$reslut=mysqli_query($q,$con);//执行sql

if (!$reslut){
    die('Error: ' . mysqli_error());//如果sql执行失败输出错误
}else{
    echo "SUCCESS";//成功输出注册成功
}



mysqli_close($con);//关闭数据库

?>