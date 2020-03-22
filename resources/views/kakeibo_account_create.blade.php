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
           var btn = document.getElementById('account-create-button');
           
           btn.addEventListener('click', function() {
           	var id = document.getElementById('account-id').value;
           	var pass = document.getElementById('account-password').value;
           	var passRe = document.getElementById('account-password-re').value;
           	var name = document.getElementById('account-name').value
           	var secret = document.getElementById('account-secret').value;
           	
           	if(id === '' || pass === '' || passRe === '' || secret === '' || name === ''){
           		document.getElementById('error-message').innerText= '未入力の項目があります。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	if(pass != passRe){
           		document.getElementById('error-message').innerText= 'パスワードが一致しません。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	var pattern = /^[A-Za-z0-9]*$/;
           	if(!pattern.test(id)){
           		document.getElementById('error-message').innerText= 'idは半角英数字で入力してください。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	if(!pattern.test(pass) || !pattern.test(passRe)){
           		document.getElementById('error-message').innerText= 'passwordは半角英数字で入力してください。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	if(secret != 'kapibarasan'){
           		document.getElementById('error-message').innerText= '秘密の言葉が違います。';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	document.accountForm.action = "./account_create";
           	document.accountForm.submit();
           });
          }
        </script>
    </head>
    <body>
        <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
          <div class="uk-container uk-container-xsmall">
            <div>
              <span class="uk-text-large">アカウント新規作成</span>
            </div>
              <form class="uk-form-stacked" name="accountForm" method="post">
              @csrf
                <div class="uk-margin">
                    <label class="uk-form-label" for="account-id">id</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="account-id" id="account-id" type="text" placeholder="id">
                    </div>
                    <label class="uk-form-label" for="account-password">password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="account-password" id="account-password" type="password">
                    </div>
                    <label class="uk-form-label" for="account-password-re">passwordを再入力</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="account-password-re" type="password">
                    </div>
                    <label class="uk-form-label" for="account-name">なまえ</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="account-name" id="account-name" placeholder="カワウソ">
                    </div>
                    <label class="uk-form-label" for="account-secret">秘密の言葉</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="account-secret" type="password">
                    </div>
                </div>
              </form>
              <button class="uk-button uk-button-primary uk-button-small" id="account-create-button">新規作成</button>
          </div>
        </div>
        <div id="error-modal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <span id="error-message"><span>
            </div>
        </div>
    </body>
</html>
