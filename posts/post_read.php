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
    $output .= "<tr>";
    $output .= "<td>{$record["post_text"]}</td>";
    // サイズは調整してください
    $output .= "<td><img src='{$record["post_image"]}'></td>";
    $output .= "<td>{$record["post_created_at"]}</td>";
    $output .= "<td><a href='post_delete.php?post_id={$record["post_id"]}'>delete</a></td>";
    $output .= "</tr>";
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
  <table>
    <thead>
      <tr>
        <th>post_text</th>
        <th>post_created_at</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
      <?= $output ?>
    </tbody>
  </table>
</body>

</html>
