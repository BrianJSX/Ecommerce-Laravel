<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//--------------------------------------------------------------------------------------------------------------------------//
//HOME
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeControler@index');
Route::get('/home', 'HomeControler@index')->name('home');
Route::get('home/productdetails/{slug}','HomeControler@showdetailindex')->name('productdetailindex');   //xong
Route::get('/home/shop','HomeControler@showshopindex')->name('shopindex');                          //xong
Route::get('/search','HomeControler@getsearch')->name('search');                                        //xong
Route::get('/category/{slug}','HomeControler@getcategoryshop')->name('getcategoryshop');              //xong
Route::get('/brand/{slug}','HomeControler@getbrandshop')->name('getbrandshop');                       //xong
Route::get('/newsdetails/{slug}','HomeControler@getnews')->name('newsdetail');                               //xong
Route::get('/news','HomeControler@getnewsblog')->name('news');                                          //xong
Route::group(['prefix' => 'cart'], function () {
    Route::get('addajax', 'CartController@addajax')->name('cartaddajax');
    Route::get('add/{id}', 'CartController@add')->name('cartadd');
    Route::get('show', 'CartController@show')->name('cartshow')->middleware('CheckCart');
    Route::get('del/{id}',' CartController@del')->name('delcart')->middleware('CheckCart');
    Route::get('update', 'CartController@update')->name('updatecart')->middleware('CheckCart');
    Route::get('showcomplete', 'CartController@showcomplete')->name('cartcomplete')->middleware('CheckCart');
    Route::post('showcomplete', 'CartController@postcomplete')->name('postcomplete')->middleware('CheckCart');
    Route::get('complete', 'CartController@complete')->name('complete');
});

// ADMIN
Route::get('admin', 'AdminController@admin')->name('admin')->middleware('checkloginadmin');
Route::post('admin', 'AdminController@loginadmin')->name('adminlogin')->middleware('checkloginadmin');

Route::group(['prefix' => 'staff'], function () {
    Route::get('/', 'StaffController@staff')->name('staff')->middleware('CheckAdminStaff');
    Route::post('/', "StaffController@login");
});

Route::group(['prefix' => 'admin','middleware' => 'checklogindashboard' ], function () {
    //TO DO something
    Route::get('logout', 'AdminController@logoutadmin')->name('logout');


    //DASH BOARD
    Route::group(['prefix' => 'dashboard', 'middleware' => 'role:super_admin|admin|poster|writer'], function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::group(['middleware' => 'role:super_admin|admin'], function () {
            Route::get('processed/{id}', 'AdminController@processed')->name('dashboardprocessed');
            Route::get('unprocessed/{id}', 'AdminController@unprocessed')->name('dashboardunprocessed');
        });
    });
    //--------------------------------------SUPER_ADMIN-------------------------------------------//

    Route::group(['middleware' => 'role:super_admin|admin'], function () {
        //ROLES
        Route::group(['prefix' => 'role'], function () {
            Route::get('view_role','RoleController@allrole')->name('allrole');
            Route::get('create_role','RoleController@addrole')->name('addrole');
            Route::post('create_role','RoleController@create');
            Route::get('update_role/{id}', 'RoleController@editrole')->name('editrole');
            Route::post('update_role/{id}', 'RoleController@update');
            Route::get('delete_role/{id}', 'RoleController@detroy')->name('detroyrole');
        });

        //PERMISSIONS
        Route::group(['prefix' => 'permission'], function () {
            Route::get('view_permission', 'PermissionController@allpermission')->name('allpermission');
            Route::get('create_permission', 'PermissionController@addpermission')->name('addpermission');
            Route::post('create_permission', 'PermissionController@create');
            Route::get('update_permission/{id}', 'PermissionController@editpermission')->name('editpermission');
            Route::post('update_permission/{id}', 'PermissionController@update');
            Route::get('delete_permision/{id}', 'PermissionController@destroy')->name('destroypermission');
        });

        //DECENTRALIZATIONS
        Route::group(['prefix' => 'decentralization'], function () {
            Route::get('create_PremissionRole', 'DecentralizationController@adddecentralization')->name('adddecentralization');
            Route::post('create_PermissionRole' , 'DecentralizationController@createPermissionRoles');
            Route::get('view_PermissionRole', 'DecentralizationController@allPermissionOfRole')->name('showpermissionofrole');
            Route::get('detele_PermissionRole/{id}', 'DecentralizationController@editRolePermission')->name('editrolepermission');
            Route::post('detele_PermissionRole/{id}', 'DecentralizationController@revokedPermissionRole');

            Route::get('view_UserRole', 'DecentralizationController@allRoleOfUser')->name('showroleofuser');
            Route::get('create_UserRole', 'DecentralizationController@addRoleOfUser')->name('addrolesuser');
            Route::post('create_UserRole', 'DecentralizationController@createRoleOfUser');
            Route::get('detele_UserRole/{id}', 'DecentralizationController@editRoleUser')->name('editroleuser');
            Route::post('detele_UserRole/{id}', 'DecentralizationController@revokedRoleUser');
        });

        //USERS
        Route::group(['prefix' => 'user'], function () {
            Route::get('view_user', 'UserController@alluser')->name('alluser');
            Route::get('create_user', 'UserController@adduser')->name('adduser');
            Route::post('create_user', 'UserController@create');
            Route::get('update_user/{id}', 'UserController@editUser')->name('edituser');
            Route::post('update_user/{id}', 'UserController@update');
            Route::get('detele_user/{id}', 'UserController@destroy')->name('destroyuser');
        });
        Route::group(['prefix' => 'tasks'], function () {
            Route::get('/view_users_tasks', 'TasksController@getUserTask')->name('view_user_task');
            Route::get('/view_tasks/{id}', 'TasksController@getTask')->name('view_tasks');
        });
    });

    //-------------------------------------------POSTER----------------------------------------//

    Route::group(['middleware' => 'role:poster|super_admin|admin'], function () {

        //SEARCH PRODUCT
        Route::get('search', 'AdminController@searchproduct')->name('searchproduct');
        //CATEGORYS
        Route::group(['prefix' => 'category'], function () {
            Route::get('view_category', 'CategoryProduct@allcategory')->name('allcategory');
            //Thêm
            Route::get('create_category', 'CategoryProduct@addcategory')->name('addcategory');
            Route::post('create_category', 'CategoryProduct@create');
            //sửa
            Route::get('update_category/{id}', 'CategoryProduct@show')->name('editcategory');
            Route::post('update_category/{id}', 'CategoryProduct@update');
            //xóa
            Route::get('delete_category/{id}', 'CategoryProduct@destroy')->name('destroycategory');
            Route::get('showcategorydesc/{id}', 'CategoryProduct@showdesc')->name('showdesc');
            Route::get('active/{id}', 'CategoryProduct@active')->name('active');
            Route::get('unactive/{id}', 'CategoryProduct@unactive')->name('unactive');
        });

        //BRANDS
        Route::group(['prefix' => 'brand'], function () {
            //thêm
            Route::get('create_brand','BrandProduct@addbrand')->name('addbrand');
            Route::post('create_brand','BrandProduct@create');
            Route::get('view_brand','BrandProduct@allbrand')->name('allbrand');
            //sửa
            Route::get('update_brand/{id}','BrandProduct@show')->name('editbrand');
            Route::post('update_brand/{id}','BrandProduct@update');
            //xóa
            Route::get('destroy/{id}','BrandProduct@destroy')->name('destroyBrand');
            Route::get('active/{id}','BrandProduct@active')->name('activeBrand');
            Route::get('unactive/{id}','BrandProduct@unactive')->name('unactiveBrand');
            Route::get('showbranddesc/{id}','BrandProduct@showdesc')->name('showdescBrand');
        });

        //PRODUCTS
        Route::group(['prefix' => 'product'], function () {
            //thêm
            Route::get('create_product','Product@getAddProduct')->name('addproduct');
            Route::post('create_product','Product@postAddProduct');
            Route::get('view_product','Product@allProduct')->name('allproduct');
            //sửa
            Route::get('update_product/{id}','Product@show')->name('editproduct');
            Route::post('update_product/{id}','Product@update');
            //xóa
            Route::get('delete_product/{id}/{code}','Product@destroy');
            Route::get('showinfoproduct/{id}','Product@showinfo')->name('showinfoproduct');
        });
    });

    //-----------------------------------------WRITER-----------------------------------------------//

    Route::group(['middleware' => 'role:super_admin|admin|writer'], function () {
        //NEWS
        Route::group(['prefix' => 'news'], function () {
            //Thêm
            Route::get('create_news','NewsController@addnews')->name('addnews');
            Route::post('create_news','NewsController@create');
            Route::get('view_news','NewsController@allnews')->name('allnews');
            //sửa
            Route::get('update_news/{id}','NewsController@show')->name('editnews');
            Route::post('update_news/{id}','NewsController@update');
            //xóa
            Route::get('delete_news/{id}','NewsController@destroy')->name('destroynews');
            Route::get('active/{id}','NewsController@active')->name('activeNews');
            Route::get('unactive/{id}','NewsController@unactive')->name('unactiveNews');
            // Route::get('showinfonews/{id}','NewsController@showinfo')->name('showinfonews');
        });

        //SLIDER
        Route::group(['prefix' => 'slider'], function () {
            Route::get('view_slider','SliderController@allslider')->name('allslider');
            //Thêm
            Route::get('create_slider','SliderController@addslider')->name('addslider');
            Route::post('create_slider','SliderController@create');
            //sửa
            Route::get('update_slider/{id}','SliderController@show')->name('editslider');
            Route::post('update_slider/{id}','SliderController@update');
            //xóa
            Route::get('delete_slider/{id}','SliderController@destroy')->name('destroyslider');
            Route::get('active/{id}','SliderController@active')->name('activeSlider');
            Route::get('unactive/{id}','SliderController@unactive')->name('unactiveSlider');
            Route::get('showcontent/{id}','SliderController@showcontent')->name('showcontent');
            // Route::get('showcategorydesc/{id}','CategoryProduct@showdesc')->name('showdesc');
        });
    });

});

















