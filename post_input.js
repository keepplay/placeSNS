

$('.submit_btn').on('click', function () {
  let error; // エラー用の変数を定義

  if ($(".text_area").val() === '') { // この要素のvalueが空文字だったらエラー
    alert('すまない！入力エラーです。確認求む');
  }

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
