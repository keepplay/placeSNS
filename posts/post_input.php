<?php
  include('../functions.php');
  session_start();
  // check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿作成</title>
</head>

<body>
  <form action="post_create.php" method="POST" enctype="multipart/form-data">
      <a href="post_read.php">一覧画面</a>
      <a href="post_logout.php">logout</a>
      <div>
        post_text: <input type="text" name="post_text">
      </div>
      <div>
        post_image: <input type="file" name="post_image" accept="image/*" capture="camera">
      </div>
      <!-- あとで追加します。by hashi -->
      <!-- <div>
        post_place: <input type="hidden" name="post_place">
      </div> -->
      <div>
        <button>submit</button>
      </div>
  </form>

</body>

</html>