<?php
include("../functions.php");
session_start();
// check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM posts_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<div>";
    $output .= "<p>{$record["post_text"]}</p>";
    // サイズは調整してください
    $output .= "<img src='{$record["post_image"]}'>";
    $output .= "<p>{$record["post_created_at"]}</p>";
    $output .= "<a href='post_delete.php?post_id={$record["post_id"]}'>delete</a>";
    $output .= "</div>";
  }
  unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧画面</title>
</head>

<body>

    <a href="post_input.php">入力画面</a>
    <a href="../users_logout.php">logout</a>
    <div>
      <div>
        <!-- ここに
                  <div>
                    <p>投稿内容</p>
                    <img src="画像">
                    <p>投稿時間
                    <a href="削除へ">
                  </div>
                  の形でデータが入る -->
        <?= $output ?>
      </div>
    </div>

</body>

</html>
