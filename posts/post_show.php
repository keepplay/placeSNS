<?php

// var_dump($_GET);
// exit();
include("../functions.php");
session_start();
// check_session_id();

$pdo = connect_to_db();

$post_id = $_POST["post_id"];

$sql = 'SELECT * FROM posts_table WHERE post_id=:post_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($value);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
</head>
<body>
    <main>
    
    </main>
</body>
</html>