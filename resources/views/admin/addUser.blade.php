@extends('adminindex')
@section('AddUserContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm User</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tên User *</label>
            <input type="text" name="user_name" class="form-control" id="exampleInputName1" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Email *</label>
            <input type="text" name="user_email" class="form-control" id="exampleInputName1" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Phone *</label>
            <input type="text" name="user_phone" class="form-control" id="exampleInputName1" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Password *</label>
            <input type="password" name="user_password" class="form-control ide" id="" placeholder="*******" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Repassword*</label>
            <input type="password" name="user_rpassword" class="form-control ide" id="" placeholder="********" required>
          </div>
          <div class="m-3">
            <input type="checkbox" onclick="showpass()"> Show Password
          </div>
          <div class="row">
              <span class="m-1">
                    <button type="submit" class="btn btn-primary mr-2">Thêm User</button>
              </span>
              <span class="m-1">
                    <a href="{{route('alluser')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
      function showpass() {
        var x = document.getElementsByClassName("ide");
            for(i=0;i<x.length;i++){
                if (x[i].type === "password") {
                    x[i].type = "text";
                } else {
                    x[i].type = "password";
                }
            }
        }
  </script>
@endsection
