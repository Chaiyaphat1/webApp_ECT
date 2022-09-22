<?php
     session_start();
     if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newpost</title>
</head>

<body>
    <h1>
        <center>Webboard KakKak</center>
    </h1>
    <hr>
    <table border=0>
        <tr>
            <td>
                ผู้ใช้ :
            </td>
            <td>
                <?php
                 echo $_SESSION['username'];
            ?>
            </td>
        </tr>
        <tr>
            <td>
                หมวดหมู่ :
            </td>
            <td>
                <select name="category">
                    <option value="All">--ทั้งหมด--</option>
                    <option value="General">เรื่องทั่วไป</option>
                    <option value="Study">เรื่องเรียน</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                หัวข้อ :
            </td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>
                เนื้อหา :
            </td>
            <td>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <input type="submit" value="บันทึกข้อความ">
            </td>
        </tr>
    </table>
</body>

</html>