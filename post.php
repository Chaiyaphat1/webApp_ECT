<?php 
$id = $_GET["id"];
$msg = "";

if(( $id % 2 ) == 0 ){
     $msg = "เป็นกระทู้หมายเลขคู่";
}else{
     $msg = "เป็นกระทู้หมายเลขคี่";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
<h1 style="text-align: center;">Webboard KakKak</h1>
<div align="center">
         

            <p>   ต้องการกูกระทู้หมายเลข  <?php echo $_GET["id"];?></p>
            <p><?php  echo $msg ?></p>
        </div>
        <hr>
        <table style="border: 2px solid black;  margin-left: auto;margin-right: auto;">
            <tr>
                <td colspan="2" style="background-color: #6CD2FE;">แสดงความคิดเห็น</td>
            </tr>
            <td><textarea name="" width="400px" height="100px"> </textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="ส่งข่อความ"></td>
            </tr>
        </table>
        <br>
        <div align="center">
            <a href="index1.php">กลับไปหน้าหลัก</a>
        </div> 
</body>
</html>