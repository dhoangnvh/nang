@extends('layout_frontend.master')
@section('content')
<div class="hp-content">
  <div class="container">
    <div class="content1">
      <div class="title">
        <div class="txt">Liên hệ</div>
        <div class="line"></div>
      </div>
    </div>
  </div>
</div>
<!--  -->
<div>
  <div class="container " style="padding-top: 50px; padding-bottom: 10px; max-width: 600px;">
    <form>
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên (*)">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Điện thoại (*)">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
      </div>
      <div class="form-group">
        <textarea rows="5" cols="" class="form-control" placeholder="Nội dung (*)"></textarea>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn-cont my-3">Gửi liên hệ</button>
      </div>
    </form>
    <div class="desc">
      <div style="text-align:center"><strong>Goldidea Hà Nội:</strong><br>
        P.404B, Gemek 2, Lê Trọng Tấn, An Khánh, Hoài Đức, Hà Nội<br>
        Điện thoại: 098765421<br>
        Hotline: 0987 654 321<br>
        Email: info@gmail.com.vn</div>
        <!-- Event snippet for Truy cập trang liên hệ conversion page -->
      </div>
  </div>
</div>
<!--  -->
<div class="hp-content">
  <div class="container">
    <div class="content2">
      <div class="description3">
        <div class="row">
          <div class="col-12 mb-3" style="color: #413631; font-size: 20px;">
            Dự án theo lĩnh vực →
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-4">
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
          </div>
          <div class="col-12 col-md-4">
            <p><a class="txt" href="#">Thiết Kế Thương Hiệu</a></p>
            <p><a class="txt" href="#">Thiết Kế Thương Hiệu</a></p>
            <p><a class="txt" href="#">Thiết Kế Thương Hiệu</a></p>
          </div>
          <div class="col-12 col-md-4">
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
            <p><a class="txt" href="#">Thiết kế Logo</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection