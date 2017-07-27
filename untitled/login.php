<?php
Session_start();

include 'passwordHash.php';//

if(isset($_POST["submit"]) && $_POST["submit"] == "LOGIN")
{
    $user = $_POST["username"];
    $psw = $_POST["password"];

    if($user == "" || $psw == "")
    {
        echo "<script>alert('Make sure the information is completed!'); history.go(-1);</script>";
    }
    else
    {
        $con=mysqli_connect("localhost","root","753951");
        mysqli_select_db($con,"sys");
        mysqli_query($con,"set names 'gbk'");
        $sql = "select username,password from user where username = '$_POST[username]'";
        $result = mysqli_query($con,$sql);
        $rows=  mysqli_fetch_array($result);
        $testpassword = $rows["password"];
        $num = mysqli_num_rows($result);
        if($num && validate_password($psw,$testpassword))
        {
            $row = mysqli_fetch_array($result);
            echo $row[0];//将数据以索引方式储存在数组中
            $_SESSION["name"]=$user;
            header("refresh:0;url=main.php");
            mysqli_close($con);//如果成功跳转至upload.html页面
            exit;
        }
        else
        {
            echo "<script>alert('Wrong username or password,please check or register.');history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('Submit not successful!'); history.go(-1);</script>";
}

?>