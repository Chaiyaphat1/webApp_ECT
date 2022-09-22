<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard KakKak</title>
    <style>
    .loginLink {
        float: right;
    }
    </style>

</head>

<body>
    <h1><center>Webboard KakKak</center></h1>
    <hr>
    หมวดหมู่:<select name="category">
        <option value="All">--ทั้งหมด--</option>
        <option value="General">เรื่องทั่วไป</option>
        <option value="Study">เรื่องเรียน</option>
    </select>
    <?php 
        if(isset($_SESSION['username'])){
            ?>
         
            <span class="" style="margin-left: 30px;">ผู้ใช้งานระบบ: <?php  echo $_SESSION['username']?></span>
            <span class="loginLink"><a href="logout.php">ออกจากระบบ</a></span>
    
            <?php
        }else{
            ?>
            <span class="" style="margin-left: 30px;">ผู้ใช้งานระบบ: GUEST</span>
            <span class="loginLink"><a href="login.php">เข้าสู่ระบบ</a></span>
     
            <?php
     
        }
        ?>

    <ul>
 <a href="newpost.php">สร้างกระทู้ใหม่</a>       
<?php 

$i=1;
do {
?>
 <li><a href="post.php?id=<?php echo $i?>">กระทู้ที่ <?php echo $i?></a>
 <?php 
                if(empty($_SESSION['role'])){
                   
                }else{

                    if($_SESSION['role'] == 'a'){
                            ?>
                            <a href="delete.php?id=<?php echo $i?>" class="">ลบ</a>
                    <?php
                    }
                }
        ?>
</li>

<?php 
$i++;
}while($i <= 10)
?>
      
      
    </ul>
</body>
</html>