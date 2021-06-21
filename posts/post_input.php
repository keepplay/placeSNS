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
  <title>投稿作成</title>
  <!-- demoマップ表示用 いい感じに変更しちゃってください -->
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #map {
      height: calc(100% - 102px);
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body>
  <form action="post_create.php" method="POST" enctype="multipart/form-data">
      <a href="post_read.php">一覧画面</a>
      <a href="post_logout.php">logout</a>
      <div>
        post_text: <input type="text" name="post_text">
      </div>
      <div>
        post_image: <input type="file" name="post_image" accept="image/*" capture="camera">
      </div>
      <div>
        <input type="hidden" id="post_lat" name="post_lat" >
      </div>
      <div>
        <input type="hidden" id="post_lng" name="post_lng">
      </div>
      <!-- あとで追加します。by hashi -->
      <!-- <div>
        post_place: <input type="hidden" name="post_place">
      </div> -->
      <div>
        <button>submit</button>
      </div>
  </form>
  <p>位置情報取得&Map表示</p>
  <div id="map"></div>
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
        e = '位置情報が許可されてません'; } else if (error.code == 2) {
        e = '現在位置を特定できません'; } else if (error.code == 3) {
        e = '位置情報を取得する前にタイムアウトになりました'; }
        alert('error:' + e);
      }

      // 地図の表示の関数を定義
      function mapsInit(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
          map = new Microsoft.Maps.Map('#map', {
          center: {
            latitude: lat, longitude: lng
          },
        zoom: 20, });
        console.log(position);
        console.log(lat,lng);
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
      window.onload = function () {
        getPosition();
      }

      


  </script>


</body>

</html>