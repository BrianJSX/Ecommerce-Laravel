@extends('adminindex')
@section('editRolePermission')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Xóa Permission Khỏi Role</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Tên Roles</label>
            <input disabled type="text" value="{{$role->name}}" class="form-control" name="role_name" id="" aria-describedby="emailHelpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleSelectGender">Permission </label>
              <select name="permission_name" class="form-control" id="exampleSelectGender" required>
                @foreach ($perWithRole["permissions"] as $permissionRole)
                    <option value="{{$permissionRole->name}}">{{$permissionRole->name}}</option>
                @endforeach
              </select>
        </div>
        <div class="row">
            <span class="m-1">
                <button type="submit" class="btn btn-warning mr-2">Xóa Permision</button>
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
