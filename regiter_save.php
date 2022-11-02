<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
}

$login = $_POST['login'];
$passwd = $_POST['pwd'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$conn = new PDO("mysql:host=localhost;dbname=web board;charset=utf8", "root", "");
$passwd=sha1($passwd);

$sql="SELECT * FROM user where login='$login'";
$result=$conn->query($sql);
if($result->rowCount()==1){
    $_SESSION['add_login']='error';
}else{
    $sql = "INSERT INTO user (login , password, name , gender , email ,role) VALUES 
        ('$login','$passwd','$name','$gender','$email','m')";
    $conn->exec($sql);
    $_SESSION['add_login']="success";
}

$conn = null;    
header("location:regitster.php");
die();     
?>