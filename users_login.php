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

    <div>
      <img src="./image/rogo.jpg" width="100" height="100">
    </div>
    <!-- 新規会員登録 -->

    <div class="firstbox">
      <p class="newperson_text">アカウントをお持ちでない方はこちら</p>
      <button class="action_btn" id="new_btn" onclick="loction.href='todo_register.php'">新規会員登録</a>
    </div>

    <!-- ログイン -->
    <form class="form" action="./users_login_act.php" method="post">


      <div class="secondbox">
        <div>
          <input type="text" class="login_username" name="user_name" placeholder="ユーザー名">
        </div>
        <div>
          <input type="password" class="logim_password" name="password" placeholder="パスワード">
        </div>
        <div>
          <button class="action_btn" id="login_btn">ログイン</button>
        </div>
      </div>

    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="kasho.js"></script>
</body>

</html>