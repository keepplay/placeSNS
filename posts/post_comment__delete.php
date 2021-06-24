<?php
include("../functions.php");
session_start();

// var_dump($_GET);
// exit();
// check_session_id();

$id = $_GET["id"];
$for_post_id=$_GET["post_id"];
// var_dump($post_id);
// exit();

$pdo = connect_to_db();

$sql = "DELETE FROM comment_table WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($status);
// exit();
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:post_show.php?post_id=$for_post_id");
    exit();
}
