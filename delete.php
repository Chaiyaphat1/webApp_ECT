<?php
    session_start();
    
    if($_SESSION['role']=='a'){
      $id = $_GET['id'];
      $conn = new PDO("mysql:host=localhost;dbname=web board;charset=utf8", "root", "");
      $deletestmt = $conn->query("DELETE post,comment FROM post
      INNER JOIN comment
      ON comment.`post_id` = post.`id`
      WHERE post.`id` = $id");
      $deletestmt->execute();
      echo "$id";
      
      if ($deletestmt) {
        echo "<script>alert('ลบข้อมูลเสร็จสิ้น');</script>";
        header("refresh:1; url=index.php");
      }else{
        die('Error : ('.$conn->errno.')'.$conn->error);
           }
      $conn = null;

    }else{
       header("location:index.php");
       die();
    }
?>