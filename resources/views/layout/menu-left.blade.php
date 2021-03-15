@php
    $user = Auth::user();
@endphp
<aside class="main-sidebar sk-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link d-flex justify-content-center pb-0">
      <img src="asset/images/03new_logo.png" alt="Douganobiru" class="brand-image img-circle"
           style="width: 100%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel my-2 d-flex ">
        <div class="image mr-3">
          <img src="asset/images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="text-secondary">Welcome,</span> <br/>
          <span class="text-white">{{$user->name}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Dự án
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link" menu-context="/add">
                  <p>Thêm mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>
                    Danh sách
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-phone-alt"></i>
              <p>
                Liên hệ
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
