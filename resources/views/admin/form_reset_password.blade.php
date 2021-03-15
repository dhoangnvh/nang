<!DOCTYPE html>
<html lang="en">
<head>
  <title>Youtube Tool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="../asset/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="../asset/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('asset/js/common.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/forgot_password.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="sk-toast">
        <div class="toast sk-toast-success" data-delay="1500">
          <div class="toast-body bg-success text-white text-center px-5 py-2">
                Success
          </div>
        </div>
    </div>
    <div class="sk-toast">
        <div class="toast sk-toast-error" data-delay="1500">
            <div class="toast-body bg-danger text-white text-center px-5 py-2">
                Error
            </div>
        </div>
    </div>
    <div class="card">
        @error('email')
            <script>
                skAlert('error', '{{$message}}');
            </script>
        @enderror
        @error('password')
            <script>
                skAlert('error', '{{$message}}');
            </script>
        @enderror
        <form action="{{route('password.update')}}" method="POST" class="card-body">
            @csrf
            <div class="div-title">
                <label class="title my-4">パスワードをリセット</label>
            </div>
            <input type="text" name="token" hidden value="{{$token}}">
            <div class="form-group">
                <label class="user-name required">メールアドレス</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <input type="email" name="email" value="{{$email}}" class="form-control background-white" readonly placeholder="メールアドレス">
                </div>
            </div>
            <div class="form-group">
                <label class="password required">パスワード</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-lock fa-fw"></i>
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="パスワード">
                </div>
            </div>
            <div class="form-group">
                <label class="password required">パスワード確認</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-lock fa-fw"></i>
                        </div>
                    </div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="パスワード確認">
                </div>
            </div>
            <button class="btn btn-primary submit">パスワードリセットリンクを送信</button>
            <div class="create-account">
                <label>アカウントを持っていない方はこちら</label>
                <a href="http://rilarc.site/"> アカウントを作成 </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
