@extends('adminindex')
@section('AddPermissionContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Permission</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tên Permission *</label>
            <input type="text" name="permission_name" class="form-control" id="exampleInputName1" 
              placeholder="Tên permission..." required>
          </div>
          <div class="row">
              <span class="m-1">
                  <button type="submit" class="btn btn-primary mr-2">Thêm permission</button>
              </span>
              <span class="m-1">
              <a href="{{route('allpermission')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection