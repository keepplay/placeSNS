<?php


session_start();
include('./functions.php');
$pdo = connect_to_db();
$user_name=$_POST['user_name'];
$password=$_POST['password'];


$sql = 'SELECT * FROM users_table
                WHERE user_name = :user_name
                AND   password = :password
                AND   is_deleted = 0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

$val = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump(!$val);
// exit();
if(!$val){
    echo('ログイン情報に誤りがあります');
    echo ('<a href="todo_login.php">login</a>');
    exit();
}else{
    // OKだったらこっち
    $_SESSION['session_id']= session_id();
    $_SESSION['is_admin']= $val['is_admin'];
    $_SESSION['user_name']= $val['user_name'];
    // URL長めに入れないと通らない
    // 各自自分のに合わせて
    header("Location: /G's/team_dev_php/posts/post_read.php");
    exit();
}