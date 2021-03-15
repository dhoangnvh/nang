<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item icon-menu">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
    </ul>
    {{-- @yield('item-header-menu') --}}
    <ul class="navbar-nav">
      <li class="nav-item icon-menu">
        <a class="nav-link d-flex align-items-center" data-widget="pushmenu" href="#" role="button">
          <i class="fab fa-youtube mr-1"></i>
          サムネイル変更
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto"></ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" style="position: relative">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
            <img src="asset/images/user.png" style="height:28px"/>
        </a>
        <div class="dropdown-menu dropdown-user">
          
          <a class="dropdown-item" href="">アカウント</a>
            <div class="dropdown-divider m-0"></div>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item" type="submit">ログアウト</button>
            </form>
            
        </div>
      </li>
    </ul>
</nav>