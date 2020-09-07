@extends('adminindex')
@section('AddRolesUserContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Roles Users</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputName1">Roles *</label>
            <select name="Roles_users" class="form-control" id="exampleSelectGender" required>
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">User *</label>
            <select name="Users_roles" class="form-control" id="exampleSelectGender" required>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <span class="m-1">
                <button type="submit" class="btn btn-primary mr-2">Thêm Quyền</button>
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
