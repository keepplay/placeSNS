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
      width: 500px;
      height:500px;
      margin: 64px;
      padding: 0;
    }

  </style>
</head>

<body>
      <form action="post_create.php" method="POST" >

        <div>
          <input type="hidden" id="post_lng" name="post_lng">
        </div>
        <div>
          <input type="hidden" id="post_lat" name="post_lat">
        </div>


        <input type="submit">



    <!-- あとで追加します。by hashi -->
    <div>
      <input type="hidden" name="post_place">
    </div>

    </form>


  </div>
  <section class="map_area">
    <p>位置情報取得&Map表示</p>
    <div id="map"></div>
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="../kasho.js"></script> -->

  <script src='https://www.bing.com/api/maps/mapcontrol?key=AjFcJuWxXYNwMC0PS8_ZQb8m92xQad3BpO3K9s7XJVoAoGuHv0eQIe4Vr5wIjQaN' async defer></script>
  <script src="./get_location_info.js"></script>

  <script src="../kasho.js"></script>


</body>

</html>
