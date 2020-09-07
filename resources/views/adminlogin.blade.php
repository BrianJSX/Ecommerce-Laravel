<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Trang Quản Lý Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/backend/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/backend/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{URL::to('public/frontend/assets/img/logo/pc.png')}}" alt="logo">
              </div>
              <h4>Xin Chào!! </h4>
              <h6 class="font-weight-light">Chúc bạn có một ngày tốt lành</h6>
            <form class="pt-3" method="POST">

              <?php
                $messageAdmin = Session::get('messageAdmin');
                $messageGuest = Session::get('messageGuest');
                if($messageAdmin){
                    echo "<div class='alert alert-danger' style='font-size:13px'>".$messageAdmin."</div>";
                    Session::put('messageAdmin',Null);
                }else if($messageGuest){
                    echo "<div class='alert alert-danger' style='font-size:13px'>".$messageGuest."</div>";
                    Session::put('messageGuest',Null);
                }
              ?>
                <div class="form-group">
                    {{ csrf_field() }}
                  <label for="exampleInputEmail">Tài Khoản</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                  <input type="text" name="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email" value="{{old('email')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Mật Khẩu</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input name="checkbox" type="checkbox" class="form-check-input">
                      Nhớ mật khẩu
                    </label>
                  </div>
                  {{-- <a href="#" class="auth-link text-black">Quên mật khẩu</a> --}}
                </div>
                <div class="my-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Đăng Nhập">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  {{-- Don't have an account? <a href="register-2.html" class="text-primary">Đăng Kí</a> --}}
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019  All rights reserved. by Minh Hồ</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('public/backend/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('public/backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('public/backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/backend/js/template.js')}}"></script>
  <!-- endinject -->
</body>

</html>
