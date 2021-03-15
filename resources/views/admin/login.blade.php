<!DOCTYPE html>
<html lang="en">
<head>
  <title>ログイン | Douganobiru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('asset/js/common.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/forgot_password.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="sk-toast">
        <div class="toast sk-toast-error" data-delay="1500">
            <div class="toast-body bg-danger text-white text-center px-5 py-2">
                Error
            </div>
        </div>
    </div>
    <div class="card">
        @if ($errors->any())
            {{-- <div class="alert alert-danger"> --}}
                @foreach ($errors->all() as $error)
                   <script>skAlert('error', '{{ $error }}');</script>
                @endforeach
            {{-- </div> --}}
        @endif
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{route('login')}}" method="POST" class="card-body">
            @csrf
            <div class="div-title">
                <label class="title my-4">ログイン</label>
            </div>
            <div class="form-group">
                <label class="user-name required">ログインID</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="text" name="login" class="form-control" placeholder="ログインID">
                </div>
            </div>
            <div class="form-group">
                <label class="password required">パスワード</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-lock fa-fw" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="パスワードを入力してください ">
                </div>
            </div>
            <div class="text-right forgot-password mb-2">
                <a href="{{route('password.request')}}">パスワードをお忘れですか？</a>
            </div>
            <button class="btn btn-primary submit mb-2">サインイン&nbsp;</button>
        </form>
    </div>
</div>
</body>
</html>
