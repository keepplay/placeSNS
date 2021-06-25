<?php
include("../functions.php");
session_start();
// check_session_id();

$pdo = connect_to_db();


$sql = 'SELECT * FROM posts_table
LEFT OUTER JOIN (SELECT for_post_id, COUNT(id) AS comment_count FROM comment_table GROUP BY for_post_id) AS  comment_count
ON posts_table.post_id = comment_count.for_post_id ORDER BY post_created_at DESC';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // $output = "";
  // foreach ($result as $record) {
  //   $output .= "<div class='post_card'>";
  //   $output .= "<div class='post_text'><p>{$record["post_text"]}</p></div>";
  //   // サイズは調整してください

  //   if (isset($record["post_image"])) {
  //     $output .= "<img class='post_img'  width='500' height='500'alt='' src='{$record["post_image"]}'>";
  //   }

  //   $output .= "<div class='post_icon_area'>";
  //   // $output .= "<p class='post_icon'><a href='post_delete.php?post_id={$record["post_id"]}'><span class='material-icons'>
  //   // delete</span></a></p>";
  //   $output .= "<p class='post_icon'><a href='post_show.php?post_id={$record["post_id"]}'><span class='material-icons'>
  //   chat</span>
  //   </a></p>";
  //   $output .= "</div>";

  //   $output .= "<p class='post_time'>{$record["post_created_at"]}</p>";
  //   $output .= "</div>";
  // }
  unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- マテリアルアイコン -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/read.css">
  <link rel="icon" href="../image/icon.png">

  <title>一覧画面</title>
</head>

<body>

  <!-- ログアウトボタン -->
  <div class="header">
    <div class="logout_btn" onclick="location.href='../users_logout.php'">
      <span class="material-icons icon_logout">logout</span>
    </div>
  </div>


  <div class="warapper">

    <!-- 投稿内容 -->
    <div class="post_area">
    </div>

    <!-- ここに
                  <div>
                    <p>投稿内容</p>
                    <img src="画像">
                    <p>投稿時間</p>
                    <a href="削除へ">
                  </div>
      の形でデータが入る -->
    <!-- <?= $output ?> -->

    <!-- フッター -->
    <footer>
      <!-- かしょまるがんばって！おなしゃす！ -->
      <!-- 投稿ボタン固定 -->
      <div class="footer_wrapper">

        <button id="page_top" class="footer_btn" onclick="location.href='post_read.php'">
          <span class="material-icons icon_navigation">navigation</span></button>

        <button class="footer_btn" onclick="location.href='post_input.php'">
          <span class="material-icons icon_edit">edit</span></button>

        <button id="reload" class="footer_btn">
          <span class="material-icons icon_refresh">refresh</span></button>


      </div>

    </footer>
  </div>
  <script>
    // map表示用に使用する変数
    let map;

    const option = {
      enableHighAccuracy: true,
      maximumAge: 20000,
      timeout: 1000000,
    };

    // エラーがでた時の処理
    function showError(error) {
      let e = '';
      if (error.code == 1) {
        e = '位置情報が許可されてません';
      } else if (error.code == 2) {
        e = '現在位置を特定できません';
      } else if (error.code == 3) {
        e = '位置情報を取得する前にタイムアウトになりました';
      }
      alert('error:' + e);
    }

    // 地図の表示の関数を定義
    function mapsInit(position) {
      const lat = position.coords.latitude.toFixed(4);
      const lng = position.coords.longitude.toFixed(4);
      // map = new Microsoft.Maps.Map('#map', {
      // center: {
      //     latitude: lat,
      //     longitude: lng
      // },
      // zoom: 20,
      // });
      console.log(position);
      console.log(lat, lng);
      $("#post_lat").val(lat);
      $("#post_lng").val(lng);


      const post_data = <?= json_encode($result) ?>;
      console.log(post_data);
      let output = "";
      for (let i = 0; i < post_data.length; i++) {
        // 現在地と同じ位置情報の投稿を表示
        if (post_data[i].post_lat == lat && post_data[i].post_lng == lng) {
          output += "<div class='post_card'>";
          console.log(post_data[i].location_name);
          if (post_data[i].location_name != null) {
            output += "<p class='post_place'>" + post_data[i].location_name + "</p>";
          }
          if (post_data[i].post_image != null) {
            output += "<img class='post_img'  width='500' height='500'alt='' src=" + post_data[i].post_image + ">";
          }
          output += "<div class='post_text'>";
          output += "<p>" + post_data[i].post_text + "</p>";
          output += "</div>";

          output += "<div class='post_icon_area'>";
          output += "<p class='post_icon'>";
          output += "<a href='post_show.php?post_id=" + post_data[i].post_id + "'>";
          output += "<span class='material-icons'>chat</span>";
          output += "</a>";


          // コメント数の表示
          output += "<a class='comment_count' href='post_show.php?post_id=" + post_data[i].post_id + "'>";
          if (post_data[i].comment_count != null) {
            output += "<span>"+ post_data[i].comment_count +"</span>";
          }else{
            output += "<span>0</span>";
          }
          output += "</a>";

          output += "</p>";

          output += "<p class='post_time'>" + post_data[i].post_created_at + "</p>";

          output += "</div>";
          output += "</div>";
        }
        // console.log(post_data[i].post_lat);
        // console.log(post_data[i].post_lng);
      }
      $('.post_area').html(output);
    }
    // console.log("現在地"+lat);
    // console.log("現在地"+lng);
    // console.log(post_data);


    // 位置情報の取得
    function getPosition() {
      navigator.geolocation
        .getCurrentPosition(mapsInit, showError, option);
      // .watchPosition(mapsInit, showError, option);
    }

    // jsファイルの読み込みが終わってから処理を開始。
    // 実際に実行しているのはここ！
    window.onload = function() {
      getPosition();
    }
  </script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../kasho.js"></script>

  <!-- リロード処理 -->
  <script>
    $('#reload').on('click', () => {
      location.reload();
    });
  </script>

  <!-- トップへ戻る -->
  <script>
    $('#page_top').click(function() {
      $('body,html').animate({
        scrollTop: 0 //ページトップまでスクロール
      }, 500); //ページトップスクロールの速さ。数字が大きいほど遅くなる
      return false; //リンク自体の無効化
    });
  </script>

</body>

</html>
