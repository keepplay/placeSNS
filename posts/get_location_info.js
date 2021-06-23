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
        }else if (error.code == 3) {
        e = '位置情報を取得する前にタイムアウトになりました';
        }
        alert('error:' + e);
    }

    // 地図の表示の関数を定義
    function mapsInit(position) {
        const lat = position.coords.latitude.toFixed(4);
        const lng = position.coords.longitude.toFixed(4);
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