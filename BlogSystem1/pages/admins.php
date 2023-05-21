<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="../styleFile.css/admins.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <form action="" method="post">
        <div class="cl2">
            <button type="submit" name="log_out" class="btn btn-outline-light">log out</a></button>
        </div>
    </form>
    <?php
    session_start();
    if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true)
        header('Location: ../index.php');
    $adminEmail = "admin@admin.com";
    if (isset($_SESSION['user_id']) && $_SESSION['email'] != $adminEmail) {
        header('Location: home.php');
    }
    if (isset($_POST['log_out'])) {
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['user_id']);
        header('Location: ../index.php');
    }
    require_once('../config/database.php');
    require_once('../classes/user.php');
    $admin1 = new User($pdo);
    $columns = $admin1->returnValues();

    ?>
    <h2 class="fw-bold  text-uppercase cl1">admin page</h2>
    <div class="cl1">
        <div class="cl2"> <button type="button" class="btn btn-outline-light"><a style="text-decoration: none; " href="adminAddPage.php">ADD</a></button></div>
        <div class="cl2"> <button type="button" class="btn btn-outline-light"><a style="text-decoration: none; " href="adminUpdatePage.php">UPDATE</a></button></div>
        <div> <button type="button" class="btn btn-outline-light"><a style="text-decoration: none; " href="adminDeletePage.php">DELETE</a></button></div>
    </div>

    <section class="intro">
        <div class="gradient-custom-1 ">
            <div class="mask d-flex align-items-center ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="table-responsive bg-white">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">USERNAME</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">CREATED_AT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="" method="post">
                                            <?php foreach ($columns as $column) { ?>
                                                <?php if ($column['email'] == "admin@admin.com") {
                                                    continue;
                                                } ?>
                                                <tr>
                                                    <td><?= $column['id'] ?> </td>
                                                    <td><?= $column['username'] ?></td>
                                                    <td><?= $column['email'] ?></td>
                                                    <td><?= $column['created_at'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    include('../includes/footer.php');
    ?>