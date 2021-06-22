<?php
include("../functions.php");
session_start();
// check_session_id();
var_dump($_GET);
exit();
$post_id = $_GET["post_id"];

$pdo = connect_to_db();

$sql = "DELETE FROM posts_table WHERE post_id=:post_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:post_read.php");
  exit();
}
