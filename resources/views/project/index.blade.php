@extends('layout.master-layout')
@section('title-page')
Dự án
@endsection
@section('css')
  <link rel="stylesheet" href="asset/css/setting.css">
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
    <a href="{{ route('project.add') }}" class="btn btn-primary mb-3 btn-register">
      <i class="fas fa-plus"></i>
      Thêm mới
    </a>
    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Mô tả</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 0;
          @endphp
          @foreach ($projects as $project)
          @php
              $i++;
          @endphp
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$project->name}}</td>
            <td><img src="{{$project->image}}" alt="" srcset="" height="100px"></td>
            <td>{!! nl2br($project->description) !!}</td>
            <td>
              <a href="{{ route('project.edit', ['id'=>$project->id]) }}"><i class="fas fa-pencil-alt"></i></a>
              <a href="javascript:void(0)" onclick="confirm_del(this)" data-id="{{$project->id}}" class="ml-1"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@section('footer-js')
<script>
function confirm_del(obj) {
  if (confirm('Bạn có chắc chắn muốn xóa nó?')) {
    var project_id = $(obj).data('id');
    location.href = '/admin/project/delete/'+project_id
  }
}
</script>
@endsection
