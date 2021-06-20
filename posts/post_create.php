<?php

include("../functions.php");
session_start();
// check_session_id();

// 投稿データが入ってきているかチェック
// 画像はなしでもOK
if (
  // あとで追加します 6/19 hashi
  // !isset($_POST['post_place']) || $_POST['place'] == '' ||
  !isset($_POST['post_text']) || $_POST['post_text'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// 画像アップロード
if(isset($_FILES['post_image'])&& $_FILES['post_image']['error']==0){
    // 送信時OK
    // 送信されてきたファイルの情報を取得
    $uploaded_file_name = $_FILES['post_image']['name'];
    $temp_path = $_FILES['post_image']['tmp_name'];
    $directory_path='../image/';
    // ファイル名の準備
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis').md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    if(is_uploaded_file($temp_path)){
      // ここでtmpファイルを移動する
      if(move_uploaded_file($temp_path, $filename_to_save)){
        chmod($filename_to_save, 0644);
      }else{
        exit('Error:アップロードできませんでした');
      }
    }else{
      exit('Error：画像がありません');
    }
  }else{
    // 送信時エラー
    exit('Error:画像が送信されていません');
  }


$post_text = $_POST['post_text'];
// $deadline = $_POST['deadline'];
$post_image = $unique_name;

$pdo = connect_to_db();

$sql = 'INSERT INTO posts_table(post_id, post_text, post_place, post_image, post_created_at) 
VALUES(NULL, :post_text, NULL, :post_image, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_text', $post_text, PDO::PARAM_STR);
$stmt->bindValue(':post_image', $post_image, PDO::PARAM_STR);
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
