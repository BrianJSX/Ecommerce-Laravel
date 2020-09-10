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
    <link rel="shortcut icon" href="{{asset('./public/backend/images/favicon.png')}}"/>

</head>

<body>
<form action="{{route('searchproduct')}}">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{ URL::to('admin/dashboard')}}"><img
                            src="{{asset('./public/backend/images/logo.svg')}}" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ URL::to('admin/dashboard')}}"><img
                            src="{{asset('./public/backend/images/logo-mini.svg')}}" alt="logo"/></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                            data-toggle="minimize">
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
                            <input name="search_product" type="text" class="form-control" placeholder="Search now"
                                   aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
</form>
<ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('public/backend/images/faces/face5.jpg')}}" alt="profile"/>
            <span class="nav-profile-name">
                  <?php
                $admin_name = Session::get('admin_name');
                if ($admin_name) {
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
            @hasanyrole('super_admin|admin|poster|staff')
                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @unlessrole('staff')
                {{-- CATEGORY --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false"
                    aria-controls="ui-basic">
                        <i class="mdi mdi-circle-outline menu-icon"></i>
                        <span class="menu-title">Danh mục sản phẩm</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('addcategory')}}">Thêm</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('allcategory')}}">Tất cả danh mục</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- BRAND --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#brands" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="mdi mdi-equal-box menu-icon"></i>
                        <span class="menu-title">Hiệu sản phẩm</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="brands">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('addbrand')}}">Thêm</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('allbrand')}}">Tất cả danh mục</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- PRODUCT --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="auth">
                        <i class="mdi mdi-fridge menu-icon"></i>
                        <span class="menu-title">Sản Phẩm</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('addproduct')}}">Thêm</a></li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('allproduct')}}">Tất cả sản phẩm</a></li>
                    </ul>
                    </div>
                </li>
                @endunlessrole
            @endhasanyrole

            @hasanyrole('super_admin|admin|writer')
            {{-- SLIDER --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#sliders" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-code-string menu-icon"></i>
                    <span class="menu-title">Slider</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="sliders">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('addslider')}}">Thêm</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('allslider')}}">Tất cả slider</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- NEWS --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-newspaper menu-icon"></i>
                    <span class="menu-title">News</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="news">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('addnews')}}">Thêm</a></li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('allnews')}}">Tất cả News</a></li>
                    </ul>
                </div>
            </li>
            @endhasanyrole

            @role('super_admin')
            {{-- ROLES --}}
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false"
                 aria-controls="ui-basic">
                 <i class="mdi mdi-wallet-travel menu-icon"></i>
                  <span class="menu-title">Role</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="roles">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('addrole')}}">Thêm</a>
                      </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('allrole')}}">Tất cả roles</a>
                    </li>
                </ul>
              </div>
            </li>
            {{-- PERMISSION --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#permissions" aria-expanded="false"
                  aria-controls="ui-basic">
                  <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Permissions</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="permissions">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('addpermission')}}">Thêm</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('allpermission')}}">Tất cả permissions</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- decentralization --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#decentralizations" aria-expanded="false"
                  aria-controls="ui-basic">
                  <i class="mdi mdi-clipboard-account menu-icon"></i>
                    <span class="menu-title">Decentralization</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="decentralizations">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('adddecentralization')}}">Thêm Permission trong Roles</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('showpermissionofrole')}}">Permissions trong Roles</a>
                        </li>
                    </ul>

                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('addrolesuser')}}">Thêm Roles cho Users</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('showroleofuser')}}">Roles trong Users</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- USER --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-comment-account menu-icon"></i>
                    <span class="menu-title">Users</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="users">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('adduser')}}">Thêm</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('alluser')}}">Tất cả users</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
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
        @yield('AddRoleContent')
        @yield('AddPermissionContent')
        @yield('AddUserContent')
        @yield('AddRolesUserContent')

        @yield('AllCategoryContent')
        @yield('AllSliderContent')
        @yield('AllNewsContent')
        @yield('allBrand')
        @yield('allProduct')
        @yield('AllRoleContent')
        @yield('AllPermissionContent')
        @yield('AllPermissionRoleContent')
        @yield('AllRoleUserContent')

        @yield('editCategory')
        @yield('editBrand')
        @yield('editProduct')
        @yield('editNews')
        @yield('editSlider')
        @yield('editRole')
        @yield('editPermission')
        @yield('editRolePermission')
        @yield('editRoleUser')
        @yield('EditUser')
        @yield('UserContent')
    <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a
                        href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"> Minh Hồ</i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
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
    $(document).ready(function () {
        $("#checkall").click(function () {
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
</body>
</html>

