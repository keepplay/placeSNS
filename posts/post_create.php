<?php

include("../functions.php");
session_start();
// check_session_id();


if (
  // あとで追加します 6/19 hashi
  // !isset($_POST['post_place']) || $_POST['place'] == '' ||
  !isset($_POST['post_text']) || $_POST['post_text'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}


$post_text = $_POST['post_text'];
// $deadline = $_POST['deadline'];

$pdo = connect_to_db();

$sql = 'INSERT INTO posts_table(post_id, post_text, post_place, post_img, post_created_at) 
VALUES(NULL, :post_text, NULL, NULL, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_text', $post_text, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:post_input.php");
  exit();
}
