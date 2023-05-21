<?php
include('../includes/registerHeader.php');
require_once('../classes/User.php');
require_once('../config/database.php');
session_start();
$adminEmail = "admin@admin.com";
if (isset($_SESSION['user_id']) && $_SESSION['email'] != $adminEmail) {
    header('Location: home.php');
}


if ($_POST && isset($_POST['register'])) {
    $user = new User($pdo);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $resuilt = $user->updatePassword($username, $email, $password);
    if ($resuilt === true) {
        header('Location: adminUpdatePage.php');
        exit;
    } else {
        $errors = $resuilt;
    }
}






?>



<div class="form-container">

    <form action="" method="post" class="SIN">
        <h3>Update User Password</h3>
        <input type="text" name="username" required placeholder="Enter The Username" class="Sin1" required>
        <input type="email" name="email" required placeholder="Enter The Email" class="Sin2" required>
        <input type="password" name="password" required placeholder="Enter The New Password" class="Sin2" required>
        <input type="submit" name="register" value="Update Password" class="form-btn">
        <div> <button type="button" class="btn btn-outline-light"><a style="text-decoration: none; " href="admins.php">Go Back</a></button></div>

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