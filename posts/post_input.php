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
  <!-- マテリアルアイコン -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/post.css">


  <title>投稿作成</title>
  <!-- demoマップ表示用 いい感じに変更しちゃってください -->
  <!-- <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #map {
      width: 300px;
      height: 300px;
      margin: 64px;
      padding: 0;
    }

  </style> -->
</head>

<body>

  <header class="site_header">
    <h1 class="site_logo">stillart</h1>
    <nav class="gnav">
      <ul class="gnav__menu">

        <li class="gnav__menu__item"><a href="post_read.php"><span class="material-icons">
              home
            </span></li>

        <li class="gnav__menu__item"><a href="post_logout.php"><span class="material-icons">
              logout
            </span></a></li>

      </ul>
    </nav>
  </header>

  <div class="post_area">
    <form action="post_create.php" method="POST" enctype="multipart/form-data">

      <div class="post_text">
        なんとなく書く: <input type="text" name="post_text" placeholder="いまの気持ち">
      </div>

      <div class="post_img">
        写真: <input type="file" name="post_image" accept="image/*" capture="camera">
      </div>

      <div>
        <input type="hidden" id="post_lat" name="post_lat">
      </div>
      <div>
        <input type="hidden" id="post_lng" name="post_lng">
      </div>
      <!-- あとで追加します。by hashi -->
      <div>
        post_place: <input type="hidden" name="post_place">
      </div>
      <div>
        <button>submit</button>
      </div>

  </div>

  <!-- あとで追加します。by hashi -->
  <!-- <div>
        post_place: <input type="hidden" name="post_place">
      </div> -->
  <div>
    <button>書き残す</button>
  </div>
  </form>

  <section class="map_area">
    <p>位置情報取得&Map表示</p>
    <div id="map"></div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://www.bing.com/api/maps/mapcontrol?key=AjFcJuWxXYNwMC0PS8_ZQb8m92xQad3BpO3K9s7XJVoAoGuHv0eQIe4Vr5wIjQaN' async defer></script>
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
      const lat = position.coords.latitude;
      const lng = position.coords.longitude;
      map = new Microsoft.Maps.Map('#map', {
        center: {
          latitude: lat,
          longitude: lng
        },
        zoom: 20,
      });
      console.log(position);
      console.log(lat, lng);
      $("#post_lat").val(lat);
      $("#post_lng").val(lng);


    }

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


</body>

</html>
