@extends('adminindex')
@section('editRoleUser')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Xóa Roles Khỏi Users</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Tên User</label>
            <input disabled type="text" value="{{$users->name}}" class="form-control" name="user_name" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleSelectGender">Roles</label>
              <select name="role_name" class="form-control" id="exampleSelectGender" required>
                @foreach ($users["roles"] as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
              </select>
        </div>
        <div class="row">
            <span class="m-1">
                <button type="submit" class="btn btn-warning mr-2">Xóa Permision</button>
            </span>
            <span class="m-1">
                <a href="{{route('showroleofuser')}}"class="btn btn-danger mr-2">Hủy</a>
            </span>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
