<?php
// var_dump($_POST);
// exit();
// var_dump($_FILES);
// exit();
include("../functions.php");
session_start();
// check_session_id();

// 投稿データが入ってきているかチェック
// 画像はなしでもOK
if (
  // 場所名は任意入力
  // !isset($_POST['post_place']) || $_POST['place'] == '' ||
  !isset($_POST['post_text']) || $_POST['post_text'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 画像アップロード
if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] == 0) {
  // 送信時OK
  // 送信されてきたファイルの情報を取得
  $uploaded_file_name = $_FILES['post_image']['name'];
  $temp_path = $_FILES['post_image']['tmp_name'];
  $directory_path = '../image/';
  // ファイル名の準備
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;


  if (is_uploaded_file($temp_path)) {
    // ここでtmpファイルを移動する
    if (move_uploaded_file($temp_path, $filename_to_save)) {
      chmod($filename_to_save, 0644);
    } else {
      // 画像なしでも投稿できる仕様のため
      // exit('Error:アップロードできませんでした');
    }
  } else {
    // 画像なしでも投稿できる仕様のため
    // exit('Error：画像がありません');
  }
} else {
  // 画像なしでも投稿できる仕様のため
  // 送信時エラー
  // exit('Error:画像が送信されていません');
}



$post_text = $_POST['post_text'];
$post_lat = $_POST['post_lat'];
$post_lng = $_POST['post_lng'];
// $deadline = $_POST['deadline'];
$post_image = $filename_to_save;

$location_name = $_POST['location_name'];

// var_dump($post_lat);
// var_dump($post_lng);
// exit();
$pdo = connect_to_db();

$sql = 'INSERT INTO posts_table(post_id, post_text, post_lat, post_lng, post_image, location_name, post_created_at)
VALUES(NULL, :post_text, :post_lat, :post_lng, :post_image,:location_name, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_text', $post_text, PDO::PARAM_STR);
$stmt->bindValue(':post_image', $post_image, PDO::PARAM_STR);
$stmt->bindValue(':location_name', $location_name, PDO::PARAM_STR);
$stmt->bindValue(':post_lat', $post_lat, PDO::PARAM_STR);
$stmt->bindValue(':post_lng', $post_lng, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:post_read.php");
  exit();
}
