<?php
session_start();
require_once('../classes/Post.php');
require_once('../config/database.php');
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true)
    header('Location: ../index.php');
if ($_POST && isset($_POST['add'])) {
    $post = new post($pdo);
    $t1 = $post->addPost($_POST['title'], $_POST['context']);
    $h12 = "error";
    if ($t1) {
        $h12 = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleFile.css/home.css">
    <title>Add</title>
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
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 70%;
    width: 99%;">

        <input class="Ntitle" type="text" required name="title" placeholder="Blog's Title" style="width: 20%;
    height: 8%;
    caret-color: rgb(62, 55, 128);
    border-color: #7227cd;
    text-align: center;
    font-family: cursive;
    background: rgba(123, 116, 149, 0.22);
    border-width: 2.5px;
    border-style: groove;
    border-radius: 16px;
    font-size: 1em; color : whitesmoke ; margin-bottom: 1%; ">


        <textarea name="context" id="" required cols="30" rows="10" style="min-width: 48%;
    min-height: 74%;
    margin-bottom: 1%;caret-color: rgb(62, 55, 128);
    border-color: rgb(114, 39, 205);
    font-family: cursive;
    background: rgba(123, 116, 149, 0.22);
    border-width: 2.5px;
    border-style: groove;
    border-radius: 2%;
    font-size: 0.8em;
    color: whitesmoke;
    text-indent: 4%;"></textarea>
        <input class="addbutton" type="submit" name="add" value="add" style="    color: white;
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