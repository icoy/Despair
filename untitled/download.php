<?php

session_start();

?>

<!DOCTYPE html >
<html>

    <head>
        <title>Signin Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <meta name="keywords" content="Ethos Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!--webfonts-->
        <link href='//fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
    </head>

<body>
<div class="main">
    <div class="login">
        <h1>Upload Files</h1>
        <div class="inset">
            <!--start-main-->
            <form >
                <?php
                session_start();
                //定义目录
                $fname = $_SESSION['path'];//需要显示的目录
                //取上级目录
                $arr = glob($fname."/*");
                foreach($arr as $v)
                {
                    $name = basename($v); //从完整路径中取文件名
                    $name = iconv("gbk","utf-8",$name);
                    if(is_dir($v))
                    {
                        echo "<input type='text' url='{$v}'>{$name}</input>
                              <span><label>$name</label></span>";
                    }
                    else
                    {
                        echo
                        "<input type='text' url='{$v}' value=''>
                         <div>
                         </div>
                         
                    </input>";
                    }
                }
                ?>
                <div><a href="main.php">Retrun</a></div>

            </form>
        </div>
    </div>
    <!--//end-main-->
</div>
</body>

</html>
