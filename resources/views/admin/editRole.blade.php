@extends('adminindex')
@section('editRole')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sửa roles</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Tên role</label>
            <input type="text" value="{{$roles->name}}" class="form-control" name="role_name" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="row">
            <span class="m-1">
                <button type="submit" class="btn btn-primary mr-2">Sửa</button>
            </span>
            <span class="m-1">
                <a href="{{route('allrole')}}"class="btn btn-danger mr-2">Hủy</a>
            </span>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
