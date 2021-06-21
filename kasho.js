// $("input[name='username']").blur(function(){
//   if ($(this).val() == "") {

//     $(this).css("background-color", "#ffe8e8");

//     $('#username').after('<div class="err_msg">ニックネームを入力してください</div>');

// if(!$(this).nextAll('span.error-info').length)
//   {
//     //メッセージを後ろに追加
//     $(this).after('<span class = "error-info">入力エラーです</span>');
//   }
// }
// else
// {
//   //エラーじゃないのにメッセージがあったら
//   if($(this).nextAll('span.error-info').length)
//   {
//     //消す
//     $(this).nextAll('span.error-info').remove();
//   }



//   } else {
//     $(this).css("background-color", "#FaFEFF");
// 	}
// });

// $("input[name='email']").blur(function(){
// 	if($(this).val() == ""){
//     $(this).css("background-color", "#ffe8e8");
//     $('#email').after('<div class="err_msg">アドレスを入力してください</div>');
// 	}else{
//     $(this).css("background-color", "#FaFEFF");
// 	}
// });

// $("input[name='password']").blur(function(){
// 	if($(this).val() == ""){
//     $(this).css("background-color", "#ffe8e8");
//     $('#password').after('<div class="err_msg">パスワードを入力してください</div>');
// 	}else{
//     $(this).css("background-color", "#FaFEFF");
// 	}
// });

// let mailcheck = /^[\w_-]+@[\w\.-]+\.\w{2,}$/;

// $("input[name='email']").keyup(function(){
// 	if($(this).val().match(mailcheck)){
// 		$(this).css("background-color", "#FaFEFF");
// 	}else{
// 		$(this).css("background-color", "#FEF4F8");
// 	}
// });

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

    if($(this).attr('validate').match("mailadd")){
  if(!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/g)){
    if($(this).next().text() === ""){
      $(this).after("<div class='vErrorMsg'>メールアドレスの形式で入力してください</div>");
    }
    return true;
  }else{
    if($(this).next().text() !== "") $(this).next().remove();
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
