<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/assets/css/kakeibo.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/uikit.min.css')}}">
        <script src="{{url('/assets/js/uikit.min.js')}}"></script>
        <script src="{{url('/assets/js/uikit-icons.min.js')}}"></script>
        <script>
          window.onload = function() {
           var btn = document.getElementById('family-info-update');
           
           btn.addEventListener('click', function() {
           	var family = document.getElementById('regist-family').value;
           	var familyNew = document.getElementById('regist-family-new').value;
           	
           	if(family === '' && familyNew === ''){
           		document.getElementById('error-message').innerText= '家族を選んでください。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	document.familyForm.action = "./family_info_update";
           	document.familyForm.submit();
           });
          }
        </script>
    </head>
    <body>
    <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
      <div>
        <span class="uk-text-large uk-heading-bullet">アカウント作成結果</span>
      </div>
      <div>
        <p>登録成功だぬん。</p>
        <p>所属する家族を選んでください。↓</p>
        <form name="familyForm" method="post">
          @csrf
          <select class="uk-select uk-form-small" name="regist-family" id="regist-family" style="width:120px;">
            <option value=""></option>
            @foreach($familyList as $family)
            <option value="{{$family->family}}">{{$family->family}}</option>
            @endforeach
          </select>
          <p>リストにない場合は追加してください。↓</p>
          <input class="uk-input uk-form-small" placeholder="カワウソ家"  name="regist-family-new" id="regist-family-new" autocomplete="off" style="width:120px;"></input>
          <p>※両方入力した場合は↓が優先されます。</p>
          <input type="hidden" name="account-id" value={{$id}}></input>
        </form>
        <button class="uk-button uk-button-primary uk-button-small" id="family-info-update">選択</button>
        </div>
      </div>
      <img src="{{asset('./assets/img/kawauso_1.jpg')}}">
    </div>
    <div id="error-modal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <span id="error-message"><span>
        </div>
    </div>
    </body>
</html>
