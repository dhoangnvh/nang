@extends('layout.master-layout')
@section('title-page')
Dự án
@endsection
@section('css')
  <link rel="stylesheet" href="asset/css/setting.css">
  <link rel="stylesheet" href="asset/summernote/summernote-bs4.css">
@endsection
@section('item-header-menu')
<ul class="navbar-nav">
  <li class="nav-item icon-menu">
    <a class="nav-link d-flex align-items-center" data-widget="pushmenu" href="#" role="button">
        <i class="fa fa-cog mr-1"></i>
        Dự án
    </a>
  </li>
</ul>
@endsection
@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <form role="form">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên dự án</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Ảnh</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea name="short-description" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Chi tiết</label>
                <textarea name="description" rows="10" class="form-control textarea"></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
          </form>
    </div>
</div>
@endsection

@section('footer-js')
<script src="asset/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
      height: 300,   //set editable area's height
      codemirror: { // codemirror options
        theme: 'monokai'
      }
    });
  })
</script>
@endsection
