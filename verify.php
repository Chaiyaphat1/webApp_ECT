<?php 
$user = $_POST["login"];
$password = $_POST["pwd"];
?>
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

        <?php 
     if($user == "admin"&& $password =="ad1234"){
        echo "ยินดีต้อนรับคุณ ADMIN";
     }elseif($user == "member"&& $password =="mem1234"){
        echo "ยินดีต้อนรับคุณ MEMBER"; 
    }
        else{
            echo "ชื่อบัญชี่หรือรหัสผ่านไม่ถูกต้อง";
        }
       ?>
       <br>
<a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>

</html>