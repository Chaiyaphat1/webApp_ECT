<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
</head>
<body>
<h1 align="center"> Webverify</h1>
    <hr>
    <div align="center">
        เข้าสู่ระบบด้วย<br>
        Login =<?php echo $_POST["login"];?><br>
        Password = <?php echo $_POST["pwd"];?>
        <?php echo "login = ".$_POST["login"]."<br>";
        echo "Password = ".$_POST["pwd"]."<br>";
        ?>

    </div>
</body>
</html>