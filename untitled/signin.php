<?php

//error_reporting(E_ALL);
include 'passwordHash.php';

if(isset($_POST["submit"]) && $_POST["submit"] == "SIGNIN")
{
    $user = $_POST["username"];
    $psw = $_POST["password"];
    $psw_confirm = $_POST["confirm"];

    if($user == "" || $psw == "" || $psw_confirm == "")
    {
        echo "<script>alert('Make sure the information is completed!'); history.go(-1);</script>";
    }
    else
    {
        if($psw == $psw_confirm && strlen($psw) <= 36)
        {

            $psw_hash=create_hash($psw);//


            $con=mysqli_connect("localhost","root","753951");   //连接数据库
            mysqli_select_db($con,'sys');  //选择数据库
            mysqli_query($con,"set names 'gbk'"); //设定字符集
            $sql = "select username from user where username = '$_POST[username]'"; //SQL语句
            $result = mysqli_query($con,$sql);    //执行SQL语句
            $num = mysqli_num_rows($result); //统计执行结果影响的行数
            if($num)    //如果已经存在该用户
            {
                echo "<script>alert('Existed username!'); history.go(-1);</script>";
            }
            else    //不存在当前注册用户名称
            {
                $sql_insert = "insert into user (id,username,password) values(NULL,'$_POST[username]','$psw_hash')";
                $res_insert = mysqli_query($con,$sql_insert);
                $num_insert = mysqli_num_rows($con,$res_insert);
                if($res_insert)
                {

                    echo "<script>alert('Success!');mysqli_close($con);history.go(-1);</script>";
                }
                else
                {
                    echo "<script>alert('System is busy!'); history.go(-1);</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Wrong password！Or is beyond the limit---36'); history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('Submitting not completed yet！'); history.go(-1);</script>";
}
?>