<?php
session_start();
$_SESSION['cnt'] = 0;
require_once('../classes/Post.php');
require_once('../config/database.php');
$post1 = new Post($pdo);
$view = $post1->viewAllPost();
$img = $post1->returnImg();
if (isset($_POST['log_out'])) {
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['user_id']);
    header('Location: ../index.php');
}
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true)
    header('Location: ../index.php');
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleFile.css/home.css">
    <title>Document</title>
</head>

<body>
    <div class="PBS"><a href="" class="BS">BS</a></div>
    <img src="../images/<?= $img; ?>" style="width: 100px; height: 100px; position: absolute; right: 50px; top: 30px; border-radius: 20px;" alt="profile img ">





    <?php
    foreach ($view as $views) { ?>
        <?php
        if ($_SESSION['cnt'] == 0) { ?>
            <div class="div<?= $views['id'] ?>" style=" background-color: #267c84 ;
    width: 63% ;
    height: 66% ;
    background: rgba(148, 138, 184, 0.22) ;
    border-radius: 4%; ">
                <div class="blog<?= $views['id'] ?>" style="height: 100%;
        margin-bottom:10px;
        width: 100%;
        font-family: cursive;
        color: #d6cbcb;
        position: relative;">
                    <h1 class="Btitle<?= $views['id'] ?>" style="text-align: center;
  margin: 0px;"><?= $views['title'] ?></h1>
                    <h3 class="Bid<?= $views['id'] ?>" style="width: 10%;
  position: absolute;
  left: 2%;
  top: 92%;">B-ID-<?= $views['id'] ?></h3>
                    <h3 class="Aid<?= $views['id'] ?>" style="width: 14%;
  position: absolute;
  
  left: 82%;
  top: 88%;">author-ID-<?= $views['author_id'] ?></h3>
                    <p class="blogtxt<?= $views['id'] ?>" style="font-size: x-large;
  color: whitesmoke;
  text-indent: 42px;"><?= $views['context'] ?></p>

                    <h3 class="Bat<?= $views['id'] ?>" style=" width: 23%;
  position: absolute;
  left: 77%;
  top: 93%;"><?= $views['created_at'] ?></h3>
                </div><?php } ?>
            <!-- ______________________________________________ -->
            <?php if ($_SESSION['cnt'] > 0) { ?>
                <div class="div<?= $views['id'] ?>" style=" background-color: #267c84 ;
    width: 100% ;
    height: 100% ;
    background: rgba(148, 138, 184, 0.22) ;
    border-radius: 4%; ">
                    <div class="blog<?= $views['id'] ?>" style="height: 100%;
        margin-bottom:10px;
        width: 100%;
        font-family: cursive;
        color: #d6cbcb;
        position: relative;">
                        <h1 class="Btitle<?= $views['id'] ?>" style="text-align: center;
  margin: 0px;"><?= $views['title'] ?></h1>
                        <h3 class="Bid<?= $views['id'] ?>" style="width: 10%;
  position: absolute;
  left: 2%;
  top: 92%;">B-ID-<?= $views['id'] ?></h3>
                        <h3 class="Aid<?= $views['id'] ?>" style="width: 14%;
  position: absolute;
  
  left: 82%;
  top: 88%;">author-ID-<?= $views['author_id'] ?></h3>
                        <p class="blogtxt<?= $views['id'] ?>" style="font-size: x-large;
  color: whitesmoke;
  text-indent: 42px;"><?= $views['context'] ?></p>

                        <h3 class="Bat<?= $views['id'] ?>" style=" width: 23%;
  position: absolute;
  left: 77%;
  top: 93%;"><?= $views['created_at'] ?></h3>
                    </div>

                <?php }
            $_SESSION['cnt']++ ?> ;
            <?php } ?>
            <div style="
     display: flex;
     height: 8%;
     width: 100%;
     flex-direction: row;
     justify-content: space-evenly;
     margin-top: 1%;
     "><a class="addB" href="addPost.php">Add Blog</a>
                <form action="" method="post" class="addB">
                    <button type="submit" name="log_out" class="logbtn">Log Out</a></button>
                </form>
                <a class="deleteB" href="deletePost.php">Delete Blog</a>
            </div>
                </div>
</body>

</html>