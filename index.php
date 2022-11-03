<?php
session_start();
?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<!-- CSS only -->
<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel = 'stylesheet' integrity = 'sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin = 'anonymous'>
<!-- JavaScript Bundle with Popper -->
<script src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity = 'sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin = 'anonymous'></script>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css'>
<title>index</title>
<script>
    function myFunction(){
        let r=confirm("ต้องการจะลบจริงหรือไม่");
        return r;
    }
</script>

</head>
<?php
if ( !isset( $_SESSION[ 'id' ] ) ) {
    ?>

    <body>
    <div class = 'container'>
    <h1 style = 'text-align: center;'>Webboard Chaiyaphat</h1>
    <?php include 'nav.php';
    ?>
    <br>
    <div class = 'd-flex'>
    <div>
    <label>หมวดหมู่</label>
    <span class = 'dropdown'>
    <button class = 'btn btn-light dropdown-toggle btn-sm' type = 'button' id = 'dropdown2' data-bs-toggle = 'dropdown' aria-expanded = 'false'>--ทั้งหมด--</button>
    <ul class = 'dropdown-menu' aria-labelledby = 'dropdown2'>
    <li><a href = '#' class = "dropdown-item">ทั้งหมด</a></li>
    <li><a href = '#' class = "dropdown-item">เรื่องเรียน</a></li>
    <li><a href = '#' class = "dropdown-item">เรื่องทั่วไป</a></li>
    </ul>
    </span>
    </div>
    </div>
    <br>
    <table class = 'table table-striped'>
    <?php
    $conn=new PDO("mysql:host=localhost;dbname=web board;charset=utf8","root","");
    $sql="SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1
       INNER JOIN user as t2 ON (t1.user_id=t2.id) INNER JOIN category as t3 ON 
       (t1.cat_id=t3.id) ORDER BY t1.post_data DESC";
    $result=$conn->query($sql);
    while($row=$result->fetch()){
        echo "<tr><td>[ $row[0] ] <a style=text-decoration:none 
        href=post.php?id=$row[1]>$row[2]</a><br>  
        $row[3] - $row[4]</td></tr>";
    }
    $conn=null;
    
    for ( $i = 1; $i <= 10; $i++ ) {
        echo "<tr><td><a href=post.php?id=$i style=text-decoration:none>กระทู้ที่ $i</a></td></tr>";
    }
    ?>
    </table>
    </div>
    </body>
    <?php } else {
        ?>

        <body>
        <div class = 'container'>
        <h1 style = 'text-align: center;'>Chaiyaphat Webboard</h1>
        <?php include 'nav.php';
        ?>
        <br>
        <div class = 'd-flex'>
        <div>
        <label>หมวดหมู่</label>
        <span class = 'dropdown'>
        <button class = 'btn btn-light dropdown-toggle btn-sm' type = 'button' id = 'dropdown2' data-bs-toggle = 'dropdown' aria-expanded = 'false'>--ทั้งหมด--</button>
        <ul class = 'dropdown-menu' aria-labelledby = 'dropdown2'>
        <li><a href = '#' class = 'dropdown-item'>ทั้งหมด</a></li>
        <li><a href = '#' class = 'dropdown-item'>เรื่องเรียน</a></li>
        <li><a href = '#' class = 'dropdown-item'>เรื่องทั่วไป</a></li>
        </ul>
        </span>
        </div>
        <div>
        <a href = 'newpost.php' class = 'btn btn-success btn-sm'><i class = 'bi bi-plus-square'></i>สร้างกระทู้</a>
        </div>
        </div>
        <br>
        <table class = 'table table-striped'>
        <?php
        for ( $i = 1; $i <= 10; $i++ ) {
            echo "<tr><td><a href=post.php?id=$i style=text-decoration:none>กระทู้ที่ $i</a></td>";

            if ( $_SESSION[ 'role' ] == 'a' ) {
                echo "<td><a href=delete.php?id=$i class='btn btn-danger btn-sm'
                onclick='return myFunction();'>
                    <i class='bi bi-trash'></i></a></td>";
            }
        }
        echo '</tr>';
        ?>
        </table>
        </div>
        </body>
        <?php }
        ?>

        </html>