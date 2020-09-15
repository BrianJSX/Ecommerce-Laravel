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
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{asset('/public/backend/images/logo.svg')}}" alt="logo">
                </div>
                <h4>Chào!! Chúc bạn ngày mới vui vẻ :<</h4>
                <h6 class="font-weight-light">Vui Lòng đăng nhập để quản lý.</h6>
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
                    <input value="{{old('email')}}" name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-outline-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        {{-- <input type="checkbox" class="form-check-input">
                            Keep me signed in --}}
                      </label>
                    </div>
                    <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                  </div>
                  <div class="mb-2">
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                  </div>
                </form>
              </div>
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
