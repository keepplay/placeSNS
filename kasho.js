$(document).ready(function () {
  /* 各フォームからフォーカスアウトしたときに実行 */
  $(":text,textarea,:password,#email").blur(function () {

    if ($(this).attr('validate').match("required")) {
      if ($(this).val() == "") {
        if ($(this).next().text() === "") {
          $(this).css("background-color", "#ffe8e8");

          $(this).after("<div class='vErrorMsg'>入力必須項目です</div>");
        }
        return true;
      } else {
        $(this).css("background-color", "#fff");

        if ($(this).next().text() !== "") $(this).next().remove();
      }
    }


    if ($(this).attr('validate').match("alpNumeric")) {
      if (!$(this).val().match(/^[a-zA-Z0-9]+$/g)) {
        if ($(this).next().text() === "") {
          $(this).after("<div class='vErrorMsg'>半角英数字のみで入力してください</div>");
        }
        return true;
      } else {
        if ($(this).next().text() !== "") $(this).next().remove();
      }
    }

    if ($(this).attr('validate').match("mailadd")) {
      if (!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/g)) {
        if ($(this).next().text() === "") {
          $(this).after("<div class='vErrorMsg'>メールアドレスの形式で入力してください</div>");
        }
        return true;
      } else {
        if ($(this).next().text() !== "") $(this).next().remove();
      }
    }



  });

  /* 送信ボタンを押したときにエラーがあれば表示する */
  $('form').submit(function (e) {
    /* エラー表示時は送信不可 */
    if ($('div').hasClass('vErrorMsg') == true) {
      e.preventDefault();
      alert('すまない！入力エラーです。確認求む');
    }
  });
});




function previewFile(file) {
  // プレビュー画像を追加する要素
  const preview = document.getElementById('preview');

  // FileReaderオブジェクトを作成
  const reader = new FileReader();

  // URLとして読み込まれたときに実行する処理
  reader.onload = function (e) {
    const imageUrl = e.target.result; // URLはevent.target.resultで呼び出せる
    const img = document.createElement("img"); // img要素を作成
    img.src = imageUrl; // URLをimg要素にセット
    preview.appendChild(img); // #previewの中に追加
  }

  // いざファイルをURLとして読み込む
  reader.readAsDataURL(file);
}


