<?php
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
        $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_array($result);
            echo $row[0];//将数据以索引方式储存在数组中
            header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
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