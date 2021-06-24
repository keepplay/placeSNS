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


    <img src="./image/rogo.png">


    <h1>Stillartにログイン</h1>


    <!-- ログイン -->
    <form class="form" action="./users_login_act.php" method="post">


      <div>
        <input type="text" class="login_username" name="user_name" placeholder="ユーザー名">
      </div>
      <div>
        <input type="password" class="login_password" name="password" placeholder="パスワード">
      </div>

      <div>
        <button class="action_btn">ログイン</button>
      </div>

    </form>

    <!-- 新規会員登録 -->

    <div class="person_box">
      <p class="person_text">アカウントをお持ちでない方</p>
      <button class="action_btn" onclick="location.href='./users/users_input.php'">新規会員登録</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="kasho.js"></script>
</body>

</html>
