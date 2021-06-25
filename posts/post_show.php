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

// 写真がない投稿のときはimageタグなしにする
$main_post = "";
if ($record['post_image'] != NULL) {
    $main_post = "<p class='posted_img'><img src={$record['post_image']}></p>";
}



$for_post_id = $_GET['post_id'];


$sql_comment = 'SELECT * FROM comment_table WHERE for_post_id=:for_post_id ';


$stmt_comment = $pdo->prepare($sql_comment);
$stmt_comment->bindValue(':for_post_id', $for_post_id, PDO::PARAM_INT);
$status_comment = $stmt_comment->execute();

// var_dump($for_post_id);
// exit();
if ($status_comment == false) {
    $error = $stmt_comment->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt_comment->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record_comment) {
        $output .= "<div class='comment_card'>";
        $output .= "<p class='comment_text'>{$record_comment["comment_text"]}</p>";
        $output .= "<div class='comment_footer'>";
        $output .= "<p class='post_time'>{$record_comment["comment_created_at"]}</p>";
        $output .= "<p class='post_icon'>
                <a href='./post_comment__delete.php?id={$record_comment["id"]}&post_id={$for_post_id}'>
                <span class='material-icons'>
                delete</span></a></p>";
        $output .= "</div>";

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
    <!-- マテリアルアイコン -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/comment.css">

    <title>コメント投稿</title>
</head>

<body>
    <div class="warapper">

        <div class="header">
            <div class="left_header">
                <div class="gnav__menu__item" onclick="location.href='post_read.php'">
                    <span class="material-icons">chevron_left</span>
                </div>
            </div>

            <div class="right_header">
                <div>
                    <img class="icon" src="../image/icon.png">
                </div>
            </div>

        </div>


        <!-- コメントされる側の投稿 -->
        <div class="posted_card">
            <p class="posted_place"><?= $record['location_name'] ?></p>
            <!-- デザイン皆無です、お願いします -->
            <?= $main_post ?>
            <p class="posted_text"><?= $record['post_text'] ?></p>
            <p class="posted_time"><?= $record['post_created_at'] ?></p>
        </div>


        <!-- コメント入力 -->
        <div class="comment_input_area">
            <form action="./post_comment_create.php" method="post">
                <textarea class="comment_text_area" rows="5" cols="50" name="comment_text" placeholder="コメントを入力" autofocus required></textarea>
                <input type="hidden" name="post_id" value=<?= $post_id ?>>
                <input class="comment_btn" type="submit">

            </form>
        </div>

        <!-- コメント表示 -->
        <div class="comment_area">
            <?= $output ?>
        </div>


    </div>

</body>


</html>