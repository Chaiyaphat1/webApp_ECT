<?php
     session_start();
     if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>

<?php 
$user = $_POST["login"];
$password = $_POST["pwd"];
?>
        <?php 
     if($user == "admin"&& $password == "ad1234"){
     
        $_SESSION['username']='admin';
        $_SESSION['role']='a';
        $_SESSION['id']= session_id();
        header("location:index.php");
        die();  
     }
     elseif($user == "member"&& $password == "mem1234"){
     
        $_SESSION['username']='member';
        $_SESSION['role']='m';
        $_SESSION['id']= session_id();
        header("location:index.php");
        die();
    }
        else{
           $_SESSION['error']='error';
           header("location:index");
           die();
        }
       ?>
       <br>
<a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>

</html>