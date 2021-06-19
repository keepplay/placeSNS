<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <form action="./users_login_act.php" method="post">
    <fieldset>
      <legend>todoリストログイン画面</legend>
      <div>
        username: <input type="text" name="user_name">
      </div>
      <div>
        password: <input type="password" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="todo_register.php">or register</a>
    </fieldset>
  </form>

</body>

</html>