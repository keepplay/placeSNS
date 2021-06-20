<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kasho.css">

  <title>ユーザー管理画面（入力画面）</title>
</head>

<body>
  <section class="form_parent">

    <form class="form" action="users_create.php" method="POST">
      <h1 class="title">新規会員登録</h1>

      <!-- 会員登録 -->
      <div class="firstbox">
        <div>
          <input type="text" class="username" name="username" placeholder="ユーザー名">
        </div>
        <div>
          <input type="email" class="useremail" name="email" placeholder="shima@example.com">
        </div>
        <div>
          <input type="text" class="password" name="password" placeholder="パスワード">
        </div>
        <div>
          <button class="action_btn" id="touroku_btn">登録する</button>
        </div>
      </div>
      <div class="secondbox">
        <p class="newperson_text">アカウントをお持ちの方はこちら</p>

        <button class="action_btn" id="login_gamen_btn" onclick="loction.href='../users_login.php'">ログイン画面へ</a>

      </div>
    </form>

</body>

</html>
