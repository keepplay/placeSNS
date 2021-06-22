<?php

include("../functions.php");
session_start();

if (
    !isset($_POST['comment_text']) || $_POST['comment_text'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$post_id = $_POST['post_id'];
$comment_text = $_POST['comment_text'];
// var_dump($post_id);
// var_dump($comment_text);
// exit();

$pdo = connect_to_db();

$sql = 'INSERT INTO comment_table(id, comment_text, post_id, comment_created_at)
VALUES(NULL, :comment_text, :post_id, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->bindValue(':comment_text', $comment_text, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:post_show.php?post_id={$post_id}");
    exit();
}



