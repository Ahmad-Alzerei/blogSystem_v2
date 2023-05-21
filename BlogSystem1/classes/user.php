<?php
require_once('../config/database.php');
class User
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function register($username, $email, $password)
    {
        $flag = true;
        $errors = array();
        if (empty($username)) {
            $errors[] = "please enter your username";
        }
        if (empty($email)) {
            $errors[] = "please enter your email";
        }
        if (empty($password)) {
            $errors[] = "please enter your password";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "please enter a validata email address.";
        }
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE username = :username or email= :email ");
        $stmt->execute(array(':username' => $username, ':email' => $email));
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $errors[] = "User name or email are already in  the system";
        }
        // Check if file was uploaded without errors
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpFilePath = $_FILES['image']['tmp_name'];

            // Get the file extension
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if (!($fileExtension == "png" || $fileExtension == "jpg" || $fileExtension == "jpeg")) {
                $errors[] = "upload valid img with extension png jpg jpeg";
            }
            // Generate a unique filename to prevent overwriting existing files
            $newFileName = uniqid() . '.' . $fileExtension;

            // Set the destination path where the file will be stored on the server
            $destinationPath = "../images/" . $newFileName;

            // Move the temporary file to the desired destination
            if (move_uploaded_file($tmpFilePath, $destinationPath)) {
                // File uploaded successfully, you can perform further actions here
            } else {
                // Error in moving the uploaded file
            }
            $flag = false;
        }
        if ($flag) {
            if (empty($errors)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare("INSERT INTO user (username , email , password) values (:username , :email,:password)");
                $stmt->execute(array(':username' => $username, ':email' => $email, ':password' => $hash));

                return true;
            } else {
                return $errors;
            }
        } else {
            if (empty($errors)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare("INSERT INTO user (username , email , password,pic_path) values (:username , :email,:password,:pic_path)");
                $stmt->execute(array(':username' => $username, ':email' => $email, ':password' => $hash, ':pic_path' => $newFileName));

                return true;
            } else {
                return $errors;
            }
        }
    }
    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT *FROM user WHERE email = :email");
        $stmt->execute(array(':email' => $email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('Location:home.php');
            return true;
            exit;
        } else {
            return "the email or the password is incorrect";
        }
    }
    public function returnValues()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function deleteUser($username, $email, $id)
    {
        $stmt1 = $this->pdo->prepare("DELETE FROM posts where author_id = :author_id");
        $author_id = $_SESSION['user_id'];
        $stmt1->execute(array(':author_id' => $id));
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = :id ");
        $stmt->execute(array(':id' => $id));
        return true;
    }
    public function updatePassword($username, $email, $password)
    {
        $errors = array();
        if (empty($username)) {
            $errors[] = "please enter your username";
        }
        if (empty($email)) {
            $errors[] = "please enter your email";
        }
        if (empty($password)) {
            $errors[] = "please enter your password";
        }
        if (empty($errors)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE user SET password = :password where username = :username and email = :email");
            $stmt->execute(array(':username' => $username, ':email' => $email, ':password' => $hash));
            return true;
        } else {
            return $errors;
        }
    }
}
