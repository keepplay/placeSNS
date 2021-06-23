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
<!-- <div class="right_header"></div>
<div class="gnav__menu__item"><a href="post_read.php">
    <span class="material-icons">chevron_left</span>
</div>
</div>
<img class="icon" src="../image/icon.png"> -->

<body>

  <div class="warapper">

    <div class="header">

      <div class="left_header">
        <div class="gnav__menu__item" onclick="location.href='post_read.php'">
          <span class="material-icons">chevron_left</span>
        </div>
      </div>
      <div class="right_header">
        <div>
          <img class="icon" src="../image/icon.png">
        </div>
      </div>

    </div>


    <div class="form_parent">
      <form action="post_create.php" method="POST" enctype="multipart/form-data">

        <div class="post_text">
          G's Academy<textarea class="text_area" rows="10" cols="50" name="post_text" placeholder="テキストを入力" autofocus required></textarea>
        </div>

        <div class="post_img">
          <label for="file" class="file_btn_text">
            <div class="file_btn"><span>写真を添付<span>
            </div>
          </label>
          <input type="file" id="file" class="fileinput" name="post_image" accept="image/*" capture="camera">

          <div id="preview"></div>
        </div>

        <div>
          <input type="hidden" id="post_lat" name="post_lat">
        </div>
        <div>
          <input type="hidden" id="post_lng" name="post_lng">
        </div>


        <div class="submit_btn">
          <button>書き残す</button>
        </div>

    </div>
    </form>

    <!-- あとで追加します。by hashi
    <div>



  </div>
  <section class="map_area">
    <p>位置情報取得&Map表示</p>
    <div id="map"></div>
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="../kasho.js"></script> -->

    <script src='https://www.bing.com/api/maps/mapcontrol?key=AjFcJuWxXYNwMC0PS8_ZQb8m92xQad3BpO3K9s7XJVoAoGuHv0eQIe4Vr5wIjQaN' async defer></script>
    <!-- 位置情報を取得するJS -->
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
    <script src="../post_input.js"></script>



</body>

</html>
