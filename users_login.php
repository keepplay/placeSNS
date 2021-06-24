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

    <div class="rogo">
      <img src="./image/rogo.png">
    </div>


    <h1>Stillartにログイン</h1>


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

    <!-- 新規会員登録 -->

    <div class="firstbox">
      <p class="newperson_text">アカウントをお持ちでない方はこちら</p>
      <button class="action_btn" id="new_btn" onclick="location.href='./users/users_input.php'">新規会員登録</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="kasho.js"></script>
</body>

</html>
