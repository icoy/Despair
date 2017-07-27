<?php
session_start();
/*ini_set('display_errors','on');
error_reporting(E_ALL);*/
//1.接收提交文件的用户
$username=$_SESSION['name'];
$fileintro=$_POST['fileintro'];

echo $username;
/*echo "<pre>";
print_r ($_FILES);
echo "</pre>"
*/

if(isset($_FILES['myFile']))
{
    $file_size=$_FILES['myFile']['size'];
    if($file_size>2*1024*1024) {
        echo" <script>alert('File is beyond the limit of 2M!');history.go(-1);</script>";
        exit();
    }

    $file_type=$_FILES['myFile']['type'];

    if($file_type!="image/jpeg" && $file_type!='image/pjpeg' && $file_type!='text/plain' )
    {
        echo "<script>alert('This file is $file_typefile,type must be jpg or text!');history.go(-1);</script>";
        exit();
    }


//判断是否上传成功（是否使用post方式上传）
    if(is_uploaded_file($_FILES['myFile']['tmp_name']))
    {
        //把文件转存到你希望的目录（不要使用copy函数）
        $uploaded_file=$_FILES['myFile']['tmp_name'];

        //我们给每个用户动态的创建一个文件夹
        $user_path=$_SERVER['DOCUMENT_ROOT']."/upload".$username;
        //判断该用户文件夹是否已经有这个文件夹
        if(!file_exists($user_path))
        {
            mkdir($user_path);
        }

        //$move_to_file=$user_path."/".$_FILES['myfile']['name'];
        $file_true_name=$_FILES['myFile']['name'];
        $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
        //echo "$uploaded_file   $move_to_file";
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file)))
        {
            echo "<script>alert('Upload successfully completed!');history.go(-1);</script>";
        }

        else
        {
            echo" <script>alert('Upload faild!');history.go(-1);</script>";
            exit();

        }
    }

    else
    {
        echo" <script>alert('Upload faild!');history.go(-1);</script>";
        exit();
    }

}

else
{
    echo " <script>alert('Error');history.go(-1);</script>";
    exit();
}
//获取文件的大小

?>