<?php

function connect_to_db()
{
  //それぞれのデータベースを登録して、コメントアウトして切り替える
  // ふじおさん用
  // $dbn = 'mysql:dbname=　　　　;charset=utf8;port=3306;host=localhost';

  // かしょちゃん用
  // $dbn = 'mysql:dbname=gsacf_l05_13;charset=utf8;port=3306;host=localhost';

  // はっしー用
  $dbn = 'mysql:dbname=team_php;charset=utf8;port=3306;host=localhost';


  $user = 'root';
  $pwd = '';

  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}

function check_session_id()
{
  if (
    !isset($_SESSION["session_id"]) ||
    $_SESSION["session_id"] != session_id()
  ) {
    header("Location: /../G's/vr%20_shop/login.php");
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}
