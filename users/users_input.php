<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/kasho.css">

  <title>新規会員登録</title>
</head>

<body>
  <section class="form_parent">

    <div class="icon">
      <img src="../image/icon.png">
    </div>

    <form class="form" action="users_create.php" method="POST">
      <h2 class="title">新規会員登録</h2>

      <!-- 会員登録 -->
      <div class="thirdbox">
        <div class="form_group">
          <p class="label">ニックネーム(20文字以内)

          </p>
          <input type="text" class="touroku_input" id="username" name="user_name" maxlength="20" validate="required blacklist" placeholder="例)くまもとフジオ" required>
        </div>

        <div class="form_group">
          <p class="label">メールアドレス</p>
          <input type="email" class="touroku_input" id="email" name="email" validate="required blacklist mailadd" placeholder="shima@example.com" required>
        </div>

        <div class="form_group">
          <p class="label" 　>パスワード</p>
          <input type="password" class="touroku_input" id="password" name="password" validate="required blacklist alpNumeric" placeholder="8文字以上の半角英数記号" required>
        </div>

        <div>
          <button class="action_btn" id="touroku_btn">登録する</button>
        </div>
      </div>
    </form>
    <div class="secondbox">
      <p class="newperson_text">アカウントをお持ちの方はこちら</p>

      <button class="action_btn" id="login_gamen_btn" onclick="location.href='../users_login.php'">ログイン画面へ</a>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../kasho.js"></script>
</body>

</html>
