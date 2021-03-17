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
    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Nội dung</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 0;
          @endphp
          @foreach ($contacts as $contact)
          @php
              $i++;
          @endphp
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{date('Y-m-d H:i', strtotime($contact->created_at))}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{$contact->email}}</td>
            <td>{{strip_tags(substr($contact->content, 0, 50))}}...</td>
            <td>
              <a href="{{ route('contact.view', ['id'=>$project->id]) }}"><i class="fas fa-pencil-alt"></i></a>
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
    location.href = '/admin/contact/delete/'+project_id
  }
}
</script>
@endsection
