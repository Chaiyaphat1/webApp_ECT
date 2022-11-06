<?php 
$id = $_GET["id"];
session_start();
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
    <!-- CSS only -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'>
    </script>
</head>

<body>
    <h1 style="text-align: center;">Webboard Chaiyaphat</h1>
    <div align="center">


        <p> ต้องการดูกระทู้หมายเลข <?php echo $_GET["id"];?></p>
        <p><?php  echo $msg ?></p>
    </div>
    <hr>
    <?php   
       $conn = new PDO("mysql:host=localhost;dbname=web board;charset=utf8","root","");
       $sql=$conn->query("SELECT post.`id`,post.`title`,post.`post_date`,post.`content`,user.`id`,user.`name`
       FROM post JOIN user
       ON post.`user_id`= user.`id`
       WHERE post.`id`= $id");
       $sql->execute();
       $posts=$sql->fetchAll();
       foreach($posts as $post){

       }
    ?>

    <div class="card text-dark bg-light mb-5">
        <div class="card-header bg-primary text-white"><?php echo $post['title']?></div>
        <div class="card-body">
            <div class="row mb-3 justify-content-center">
                <div class="col-lg-12">
                    <?php echo $post['content'];?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <?php echo $post['name']."-".$post['post_date'];?>
                </div>
            </div>
        </div>
    </div>

    <?php

      $conn = new PDO("mysql:host=localhost;dbname=web board;charset=utf8", "root", "");
      $sql=$conn->query("SELECT comment.`id`,comment.`content`,comment.`post_date`,
      comment.`user_id`,comment.`post_id`,user.`id`,user.`name`
       FROM comment 
       INNER JOIN user
       ON comment.`user_id`= user.`id`
       WHERE comment.`post_id`=$id");
       $sql->execute();
       $comments = $sql->fetchALL();
       $count = 0;
       foreach($comments as $comment){
       $count = $count+1;     
    ?>

    <div class="card text-dark bg-light mb-5">
        <div class="card-header bg-info text-white">ความคิดเห็นที่<?php echo $count;?></div>
        <div class="card-body">
            <div class="row mb-3 justify-content-center">
                <div class="col-lg-12">
                    <?php echo $comment['content'];?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <?php echo $comment['name']."-".$comment['post_date'];?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-dark bg-white border-success">
                <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
                <div class="card-body">
                    <form action="post_save.php" method="post">
                        <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-lg-10">
                                <textarea name="comment" class="form-control" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <center>
                                    <button type="submit" class="btn btn-success btn-sm text-white">
                                        <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div align="center">
            <a href="index.php">กลับไปหน้าหลัก</a>
        </div>
    </div>
</body>

</html>