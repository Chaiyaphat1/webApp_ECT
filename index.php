<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard KakKak</title>
</head>
<body>
    <h1><center>Webboard KakKak</center></h1>
    <hr>
    หมวดหมู่:<select name="category">
        <option value="All">--ทั้งหมด--</option>
        <option value="General">เรื่องทั่วไป</option>
        <option value="Study">เรื่องเรียน</option>
    </select>
    <a href="Login.html" style="float: right;">เข้าสู่ระบบ</a>
    <ul>
<?php 
$i=1;
do {
?>
 
 <li><a href="post.php?id=<?php echo $i?>">กระทู้ที่ <?php echo $i?></a></li>

<?php 
$i++;
}while($i <= 10)
?>
      
      
    </ul>
</body>
</html>