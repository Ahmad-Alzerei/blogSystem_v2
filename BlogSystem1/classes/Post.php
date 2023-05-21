<?php
require_once('../config/database.php');
class Post
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addPost($title, $context)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (author_id,title,context) VALUES (:author_id,:title,:context)");
        $author_id = $_SESSION['user_id'];
        $stmt->execute(array('author_id' => $author_id, ':title' => $title, ':context' => $context));
        return true;
    }
    public function viewAllPost()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE author_id = :user_id");
        $author_id = $_SESSION['user_id'];
        $stmt->execute(array(':user_id' => $author_id));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function deletePost1($id)
    {
        $stmt = $this->pdo->prepare("SELECT DISTINCT author_id FROM posts WHERE id = :id");
        $stmt->execute(array(':id' => $id));
        $col = $stmt->fetchColumn();
        if ($col == $_SESSION['user_id']) {
            $stmt = $this->pdo->prepare("DELETE FROM  posts where id = :id");
            $stmt->execute(array(':id' => $id));
        }
    }
    public function returnImg()
    {
        $stmt = $this->pdo->prepare("SELECT pic_path FROM user WHERE id = :id");
        $user_id1 = $_SESSION['user_id'];
        $stmt->execute(array(':id' => $user_id1));
        $rows = $stmt->fetchColumn();
        return $rows;
    }
}
