<?php

// var_dump($_POST);
// exit();

include('../functions.php');
$pdo = connect_to_db();


if (
  !isset($_POST['user_name']) || $_POST['user_name'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}


$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];




$sql = 'INSERT INTO users_table(user_id, user_name, email, password, is_admin, is_deleted, created_at, updated_at) 
VALUES(NULL, :user_name, :email, :password,0,0, sysdate(), sysdate())';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:users_input.php");
  exit();
}
