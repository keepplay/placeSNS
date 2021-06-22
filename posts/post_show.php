<?php

// var_dump($_GET);
// exit();
include("../functions.php");
session_start();
// check_session_id();

$pdo = connect_to_db();

$post_id = $_GET["post_id"];

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
}


$sql_comment = 'SELECT * FROM comment_table WHERE post_id=:post_id';


$stmt_comment = $pdo->prepare($sql_comment);
$stmt_comment->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$status_comment = $stmt_comment->execute();

if ($status_comment == false) {
    $error = $stmt_comment->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt_comment->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record_comment) {
    $output .= "<div class='post_card'>";
    $output .= "<p>{$record_comment["comment_text"]}</p>";
    $output .= "<div class='post_icon_area'>";
    $output .= "<p class='post_icon'>
                <a href='./post_comment__delete.php?id={$record_comment["id"]}&post_id={$post_id}'>
                <span class='material-icons'>
                delete</span></a></p>";
    $output .= "</div>";

    $output .= "<p class='post_time'>{$record_comment["comment_created_at"]}</p>";
    $output .= "</div>";

    unset($value);
    }
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
            <div>
                <!-- とりあえず一番上に作りました -->
                コメント入力のとこ
                <form action="./post_comment_create.php" method="post">
                    <input type="text" name="comment_text">
                    <input type="hidden" name="post_id" value=<?=$post_id?>>
                    <input type="submit" >
                </form>
            </div>
            <!-- コメントされる側のの投稿 -->
            <div>
                <!-- デザイン皆無です、お願いします -->
                <a href="./post_read.php">一覧に戻る</a>
                <p><?=$record['post_text']?></p>
                <img src=<?=$record['post_image']?>>
                <p><?=$record['post_created_at']?></p>
            </div>
            <!-- コメント表示 -->
            <?= $output?>
        </main>
    </body>
</html>