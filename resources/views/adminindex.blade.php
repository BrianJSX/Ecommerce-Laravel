<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
  <title> Trang Quản Lý Điện Nước Phúc Lộc</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('./public/backend/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('./public/backend/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('./public/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('./public/backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('./public/backend/images/favicon.png')}}" />
 
</head>
 
<body>
<form action="{{route('searchproduct')}}">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        <a class="navbar-brand brand-logo" href="{{ URL::to('admin/dashboard')}}"><img src="{{asset('./public/backend/images/logo.svg')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{ URL::to('admin/dashboard')}}"><img src="{{asset('./public/backend/images/logo-mini.svg')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100 row">
                <div class="input-group">
                      <div class="input-group-prepend">
                        <button type="submit" class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                          </button>
                        </div>
                        <input name="search_product" type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
          </li>
        </ul>
      </form>
        <ul class="navbar-nav navbar-nav-right">
          {{-- <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{asset('/public/backend/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{asset('./public/backend/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="{{asset('./public/backend/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> --}}
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('public/backend/images/faces/face5.jpg')}}" alt="profile"/>
              <span class="nav-profile-name">
                  <?php
                  $admin_name = Session::get('admin_name');
                  if($admin_name){
                    echo $admin_name;
                  }
                  ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              {{-- <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a> --}}
            <a class="dropdown-item" href="{{ route('logout')}}">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
  
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Danh mục sản phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('allcategory')}}">Tất cả danh mục</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('allbrand')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Hiệu sản phẩm</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Sản phẩm</span>
            </a>
          </li> --}}
          <li class="nav-item">
              <a class="nav-link" href="{{route('allslider')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Slider</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            {{-- <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('addproduct')}}">Thêm sản phẩm</a></li>   
              </ul>
            </div> --}}
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('allproduct')}}">Tất cả sản phẩm</a></li>   
                </ul>
              </div>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('allnews')}}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Tin tức</span>
            </a>
          </li>
        </ul> 
      </nav>
      <!-- partial -->
      <div class="main-panel">
       @yield('DashboardContent')
       @yield('SearchProduct')
       
       @yield('AddCategoryContent')
       @yield('AddBrandContent')
       @yield('AddProductContent')
       @yield('AddNewsContent')
       @yield('AddSliderContent')

       @yield('AllCategoryContent')
       @yield('AllSliderContent')
       @yield('AllNewsContent')
       @yield('allBrand')
       @yield('allProduct')
       
       @yield('editCategory')
       @yield('editBrand')
       @yield('editProduct')
       @yield('editNews')
       @yield('editSlider')


       

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"> Minh Hồ</i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->

  <script src="{{ URL::asset('./public/backend/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ URL::asset('./public/backend/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/vendors/datatables.net/jquery.dataTables.j')}}s"></script>
  <script src="{{ URL::asset('./public/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ URL::asset('./public/backend/js/off-canvas.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/template.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/file-upload.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('./public/editor/ckeditor/ckeditor.js')}}"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ URL::asset('./public/backend/js/dashboard.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/data-table.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/jquery.dataTables.js')}}"></script>
  <script src="{{ URL::asset('./public/backend/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ URL::asset('./resources/js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('./resources/js/ajax.js')}}"></script>
  
  <script>
    $(document).ready(function(){

      $("#checkall").click(function(){
          $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
      });
      // //Search Product
      // $('#search_product').keyup(function(){
      //     var query = $(this).val();
      //     if(query != ''){
      //       var _token = $('input[name="_token"]').val();
      //       $.ajax({
      //         url:"{{ route('searchproduct') }}",
      //         method: "get",
      //         data:{query:query,_token:_token},
      //         success:function(data){
      //           $('#productlistsearch').fadeIn();
      //           $('#productlistsearch').html(data);
      //         }
      //       });
      //     }
      //     // console.log(query);
      // });
    });
 </script>
  <!-- End custom js for this page-->
</body>

</html>

