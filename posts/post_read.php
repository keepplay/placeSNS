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
    $output .= "<div class='post_card'>";
    $output .= "<div class='post_text'><p>{$record["post_text"]}</p></div>";
    // サイズは調整してください

    if (isset($record["post_image"])) {
      $output .= "<img class='post_img'  width='100' height='100'alt='' src='{$record["post_image"]}'>";
    }

    $output .= "<div class='post_icon_area'>";
    // $output .= "<p class='post_icon'><a href='post_delete.php?post_id={$record["post_id"]}'><span class='material-icons'>
    // delete</span></a></p>";
    $output .= "<p class='post_icon'><a href='post_show.php?post_id={$record["post_id"]}'><span class='material-icons'>
    chat</span>
    </a></p>";
    $output .= "</div>";

    $output .= "<p class='post_time'>{$record["post_created_at"]}</p>";
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
  <!-- マテリアルアイコン -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/read.css">

  <title>一覧画面</title>
</head>

<body>


  <header class="site_header">
    <div class="icon">
      <img src="../image/icon.png">
    </div>
    <nav class="gnav">
      <ul class="gnav__menu">

        <li class="gnav__menu__item"><a href="post_input.php"><span class="material-icons">
              edit
            </span></li>

        <!-- <li class="gnav__menu__item"><a href="post_logout.php"><span class="material-icons">
              logout
            </span></a></li> -->

      </ul>
    </nav>
  </header>
  <div class="warapper">

    <div class="post_area">
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../kasho.js"></script>
</body>

</html>