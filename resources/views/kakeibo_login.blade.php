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
           var btn = document.getElementById('login-btn');
           
           btn.addEventListener('click', function() {
           	var id = document.getElementById('id').value;
           	var password = document.getElementById('password').value;
           	if(id === '' || password === ''){
           		document.getElementById('error-message').innerText= 'idとパスワードを入力してください';
           		UIkit.modal("#error-modal").show();
           		return;
           	}
           	document.loginForm.action = "./login";
           	document.loginForm.submit();
           });
          }
        </script>
    </head>
    <body>
        <div class="uk-background-muted uk-padding uk-panel kakeibo-background">
          <div class="uk-container uk-container-xsmall">
            <div>
              <span class="uk-text-large">ログイン</span>
            </div>
            @if($message ?? '')
              <p class="uk-label-danger">{{$message}}</p>
            @endif
              <form class="uk-form-stacked" method="post" name="loginForm">
              @csrf
                <div class="uk-margin">
                    <label class="uk-form-label" for="id">id</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="id" type="text" name="id" placeholder="id">
                    </div>
                    <label class="uk-form-label" for="password">password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" name="password" id="password" type="password">
                    </div>
                </div>
              </form>
              <button class="uk-button uk-button-primary uk-button-small" id="login-btn">ログイン</button>
              <a class="uk-link-muted" href="{{url('/kakeibo_account_create')}}">新規作成</a>
          </div>
        </div>
        <div id="error-modal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <span id="error-message"><span>
            </div>
        </div>
    </body>
</html>
