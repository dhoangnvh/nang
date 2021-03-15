@extends('layout.master-layout')
@section('title-page')
チャネル
@endsection
@section('css')
    <link rel="stylesheet" href="asset/css/401.css">
@endsection
@section('item-header-menu')
<ul class="navbar-nav">
    <li class="nav-item icon-menu">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-tachometer-alt"></i>
        チャネル
      </a>
    </li>
</ul>
@endsection
@section('content')
<div class="container-fluid">
    <!-- Channel Info -->
    <div class="row content-401">
      <div class="message-for-creator message-for-creator-sm">
        <p class="caution-for-creator caution-for-creator-sm">この機能にはYouTubeチャンネル登録が必要になります 下記よりチャンネル登録を行ってください</p>
        <div class="btn-wrapper btn-wrapper-sm">
          <a href="{{ $exception->getMessage() }}">
            <div class="btn-gg-wallpaper">
              <div class="btn-gg-wallpaper">
                <div class="img">
                    <img src="asset/images/btn-gg.svg" alt="" srcset="">
                </div>
                <span class="text">Sign in with Google</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
</div>
@endsection