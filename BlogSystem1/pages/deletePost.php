<?php
session_start();
require_once('../classes/Post.php');
require_once('../config/database.php');
$adminEmail = "admin@admin.com";
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true)
    header('Location: ../index.php');
if ($_POST && isset($_POST['delete'])) {
    $post1 = new Post($pdo);
    $post1->deletePost1($_POST['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleFile.css/home.css">
    <title>Delete</title>
    <style>
        ::placeholder {
            color: #b4a3cbed;
        }

        textarea:focus,
        input:focus {
            outline: rgba(0, 39, 79, 0.5);
            caret-color: aqua;
        }
    </style>
</head>

<body>
    <div class="PBS"><a href="home.php" class="BS">BS</a></div>
    <form action="" method="post" style="    display: flex;
    flex-direction: column;
    width: 30%;
    height : 36% ; 
    justify-content: center;
    align-items: center;">

        <input type="text" placeholder="ID's Blog" name="id" style="width: 20%;
    height: 11%;
    width: 50%;
    caret-color: rgb(62, 55, 128);
    border-color: #7227cd;
    text-align: center;
    font-family: cursive;
    background: rgba(123, 116, 149, 0.22);
    border-width: 2.5px;
    border-style: groove;
    border-radius: 16px;
    font-size: 1em; color : whitesmoke ; margin-bottom: 1%; text-align: center;">
        <br>
        <input type="submit" name="delete" value="delete" style="    color: white;
    background: linear-gradient(115deg, #267c84 10%, #610d87 90%);
    width: 60%;
    height: 10%;
    border: none;
    cursor: pointer;
    font-size: 100%;
    letter-spacing: 3px;
    font-family: cursive;">

    </form>

</body>

</html>