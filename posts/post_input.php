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

  <div class="warapper">
    <header class="site_header">
      <div class="site_logo">
        <img src="../image/rogo.png">
      </div>
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

    <div class="form_parent">
      <form action="post_create.php" method="POST" enctype="multipart/form-data">

        <div class="post_text">
          なんとなく書く<textarea class="text_area" rows="10" cols="50" name="post_text" placeholder="テキストを入力" autofocus></textarea>
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

    <!-- あとで追加します。by hashi -->
    <div>
      post_place: <input type="hidden" name="post_place">
    </div>

    </form>


  </div>
  <!-- <section class="map_area">
    <p>位置情報取得&Map表示</p>
    <div id="map"></div>
  </section> -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="../kasho.js"></script> -->

  <script src='https://www.bing.com/api/maps/mapcontrol?key=AjFcJuWxXYNwMC0PS8_ZQb8m92xQad3BpO3K9s7XJVoAoGuHv0eQIe4Vr5wIjQaN' async defer></script>
  <!-- 位置情報を取得するJS -->
  <script src="./get_location_info.js"></script>

  <script src="../kasho.js"></script>


</body>

</html>
