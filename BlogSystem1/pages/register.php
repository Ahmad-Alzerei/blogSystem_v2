<?php
include('../includes/registerHeader.php');
require_once('../classes/User.php');
require_once('../config/database.php');




if ($_POST && isset($_POST['register'])) {
    $user = new User($pdo);


    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = ($_POST['password']);


    $resuilt = $user->register($username, $email, $password);

    if ($resuilt === true) {
        header('Location: ../index.php');
        exit;
    } else {
        $errors = $resuilt;
    }
}






?>



<div class="form-container">

    <form action="" method="post" class="SIN" enctype="multipart/form-data">
        <h3>register</h3>
        <input type="text" name="username" required placeholder="Enter your username" class="Sin1" required>
        <input type="email" name="email" required placeholder="enter your email" class="Sin2" required>
        <input type="password" name="password" required placeholder="enter your password" class="Sin2" required>
        <input type="file" name="image">
        <input type="submit" name="register" value="register" class="form-btn">
        <p>do you have an account? <a href="../index.php">login now</a></p>
        <div class="container">
            <?php if (isset($errors)) : ?>
                <div class=" alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
    </form>

</div>
<?php
include('../includes/footer.php')
?>