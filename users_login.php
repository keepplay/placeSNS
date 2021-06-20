<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kasho.css">

  <title>ログイン画面</title>
</head>

<body>

  <!-- 大きい箱　幅をCssで指定 -->

  <section class="form_parent">

    <h1>しまっ</h1>

    <!-- 新規会員登録 -->

    <div class="firstbox">
      <p class="newperson_text">アカウントをお持ちでない方はこちら</p>
      <button class="action_btn" id="new_btn" onclick="loction.href='todo_register.php'">新規会員登録</a>
    </div>

    <!-- ログイン -->
    <form class="form" action="./users_login_act.php" method="post">


      <div class="secondbox">
        <div>
          <input type="text" class="username" name="user_name" placeholder="ユーザー名">
        </div>
        <div>
          <input type="text" class="password" name="password" placeholder="パスワード">
        </div>
        <div>
          <button class="action_btn" id="login_btn">ログイン</button>
        </div>
      </div>

    </form>

</body>

</html>
