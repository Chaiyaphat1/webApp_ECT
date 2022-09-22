<?php
    session_start();
    
    if($_SESSION['role']=='a'){
       echo "ลบกระทู้หมายเลข $_GET[id]";
    }else{
       header("location:index.php");
       die();
    }
?>