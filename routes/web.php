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
//Front-end

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Models\CategoryProductModel;
use App\Http\Controllers\BrandProduct;
use App\Models\BrandProductModel;
use App\Http\Controllers\Product;

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
        Route::get('show','CartController@show')->name('cartshow')->middleware('CheckCart');
        Route::get('del/{id}','CartController@del')->name('delcart')->middleware('CheckCart');
        Route::get('update','CartController@update')->name('updatecart')->middleware('CheckCart');
        Route::get('showcomplete','CartController@showcomplete')->name('cartcomplete')->middleware('CheckCart');
        Route::post('showcomplete','CartController@postcomplete')->name('postcomplete')->middleware('CheckCart');
        Route::get('complete','CartController@complete')->name('complete');
});
// route::get('/mahoa', function(){
//         $users = new User();
//         $users->name = 'testuser';
//         $users->email = 'test@gmail.com';
//         $users->password = bcrypt('123456');
//         $users->save();
// });


//----------------------------------------------------------------------------------------------------------------//
// Admin Sever

Route::get('admin','AdminController@admin')->name('admin')->middleware('checkloginadmin');
Route::post('admin','AdminController@loginadmin')->name('adminlogin')->middleware('checkloginadmin');

Route::group(['prefix' => 'staff'], function () {
    Route::get('/','StaffController@login');
});

Route::group(['prefix' => 'admin','middleware' => 'checklogindashboard','middleware' => ['role:Super_admin|admin']], function () {
        //TO DO something
        Route::get('admin/logout','AdminController@logoutadmin')->name('logout');
        Route::get('/search','AdminController@searchproduct')->name('searchproduct');

        //DASH BOARD
        Route::group(['prefix' => 'dashboard'], function () {
                Route::get('/','AdminController@dashboard')->name('dashboard');
                Route::get('processed/{id}','AdminController@processed')->name('dashboardprocessed');
                Route::get('unprocessed/{id}','AdminController@unprocessed')->name('dashboardunprocessed');
        });

        //ROLES
        Route::group(['prefix' => 'role'], function () {
                Route::get('/','RoleController@allrole')->name('allrole');
                Route::get('/addRole','RoleController@addrole')->name('addrole');
                Route::post('/addRole','RoleController@create');
                Route::get('/editRole/{id}', 'RoleController@editrole')->name('editrole');
                Route::post('/editRole/{id}', 'RoleController@update');
                Route::get('/detroyRole/{id}','RoleController@detroy')->name('detroyrole');
        });

        //PERMISSIONS
        Route::group(['prefix' => 'permission'], function () {
                Route::get('/allPermission','PermissionController@allpermission')->name('allpermission');
                Route::get('/addPermission','PermissionController@addpermission')->name('addpermission');
                Route::post('/addPermission','PermissionController@create');
                Route::get('/editPermission/{id}', 'PermissionController@editpermission')->name('editpermission');
                Route::post('/editPermission/{id}', 'PermissionController@update');
                Route::get('/detroyPermission/{id}','PermissionController@destroy')->name('destroypermission');
        });

        //Decentralization
        Route::group(['prefix' => 'decentralization'], function () {
            Route::get('/addDecentralization','DecentralizationController@adddecentralization')->name('adddecentralization');
            Route::post('/addDecentralization' , 'DecentralizationController@createPermissionRoles');
            Route::get('/allPermissionRole', 'DecentralizationController@allPermissionOfRole')->name('showpermissionofrole');
            Route::get('/allRoleUser', 'DecentralizationController@allRoleOfUser')->name('showroleofuser');
            Route::get('/addRoleUser', 'DecentralizationController@addRoleOfUser')->name('addrolesuser');
            Route::post('/addRoleUser', 'DecentralizationController@createRoleOfUser');
            Route::get('/editRolePermission/{id}', 'DecentralizationController@editRolePermission')->name('editrolepermission');
            Route::post('/editRolePermission/{id}', 'DecentralizationController@revokedPermissionRole');
            Route::get('/editRoleUser/{id}', 'DecentralizationController@editRoleUser')->name('editroleuser');
            Route::post('/editRoleUser/{id}', 'DecentralizationController@revokedRoleUser');


        });

        //USERS
        Route::group(['prefix' => 'user'], function () {
                Route::get('/alluser','UserController@alluser')->name('alluser');
                Route::get('/adduser','UserController@adduser')->name('adduser');
                Route::post('/adduser', 'UserController@create');
                Route::get('/edituser/{id}', 'UserController@editUser')->name('edituser');
                Route::post('/edituser/{id}', 'UserController@update');
                Route::get('/destroyuser/{id}', 'UserController@destroy')->name('destroyuser');
        });

        //CATEGORYS
        Route::group(['prefix' => 'category',], function () {
                //Thêm
                Route::get('/addcategory','CategoryProduct@addcategory')->name('addcategory');
                Route::post('/addcategory','CategoryProduct@create');

                Route::group(['prefix' => 'allcategory','middleware' => 'checklogindashboard'], function () {
                        Route::get('/','CategoryProduct@allcategory')->name('allcategory');
                        Route::get('active/{id}','CategoryProduct@active')->name('active');
                        Route::get('unactive/{id}','CategoryProduct@unactive')->name('unactive');
                //sửa
                        Route::get('editcategory/{id}','CategoryProduct@show')->name('editcategory');
                        Route::post('editcategory/{id}','CategoryProduct@update');
                //xóa
                        Route::get('destroy/{id}','CategoryProduct@destroy')->name('destroycategory');
                        Route::get('showcategorydesc/{id}','CategoryProduct@showdesc')->name('showdesc');

                });
        });

        //BRANDS
        Route::group(['prefix' => 'brand'], function () {
                //thêm
                Route::get('/addbrand','BrandProduct@addbrand')->name('addbrand');
                Route::post('/addbrand','BrandProduct@create');
                Route::group(['prefix' => 'allbrand','middleware' => 'checklogindashboard'], function () {
                        Route::get('/','BrandProduct@allbrand')->name('allbrand');
                        Route::get('active/{id}','BrandProduct@active')->name('activeBrand');
                        Route::get('unactive/{id}','BrandProduct@unactive')->name('unactiveBrand');
                //sửa
                        Route::get('showbranddesc/{id}','BrandProduct@showdesc')->name('showdescBrand');
                        Route::get('editbrand/{id}','BrandProduct@show')->name('editbrand');
                        Route::post('editbrand/{id}','BrandProduct@update');
                //xóa
                        Route::get('destroy/{id}','BrandProduct@destroy')->name('destroyBrand');
                });
        });

        //PRODUCTS
        Route::group(['prefix' => 'product'], function () {
                //thêm
                Route::get('/add','Product@getAddProduct')->name('addproduct');
                Route::post('/add','Product@postAddProduct');

                Route::group(['prefix' => 'allproduct','middleware' => 'checklogindashboard'], function () {
                        Route::get('/','Product@allProduct')->name('allproduct');
                //sửa
                        Route::get('showinfoproduct/{id}','Product@showinfo')->name('showinfoproduct');
                        Route::get('editproduct/{id}','Product@show')->name('editproduct');
                        Route::post('editproduct/{id}','Product@update');
                //xóa
                        Route::get('destroy/{id}/{code}','Product@destroy');
                });
        });

        //NEWS

        Route::group(['prefix' => 'news'], function () {
                //Thêm
                Route::get('/addnews','NewsController@addnews')->name('addnews');
                Route::post('/addnews','NewsController@create');

                Route::group(['prefix' => 'allnews','middleware' => 'checklogindashboard'], function () {
                        Route::get('/','NewsController@allnews')->name('allnews');
                        Route::get('active/{id}','NewsController@active')->name('activeNews');
                        Route::get('unactive/{id}','NewsController@unactive')->name('unactiveNews');
                //sửa
                        Route::get('editnews/{id}','NewsController@show')->name('editnews');
                        Route::post('editnews/{id}','NewsController@update');
                //xóa
                        Route::get('destroy/{id}','NewsController@destroy')->name('destroynews');
                        // Route::get('showinfonews/{id}','NewsController@showinfo')->name('showinfonews');

                });
        });

        //SLIDER
        Route::group(['prefix' => 'slider'], function () {
                //Thêm
                Route::get('/addslider','SliderController@addslider')->name('addslider');
                Route::post('/addslider','SliderController@create');

                Route::group(['prefix' => 'allslider','middleware' => 'checklogindashboard'], function () {
                        Route::get('/','SliderController@allslider')->name('allslider');
                        Route::get('active/{id}','SliderController@active')->name('activeSlider');
                        Route::get('unactive/{id}','SliderController@unactive')->name('unactiveSlider');
                //sửa
                        Route::get('editslider/{id}','SliderController@show')->name('editslider');
                        Route::post('editslider/{id}','SliderController@update');
                        Route::get('showcontent/{id}','SliderController@showcontent')->name('showcontent');
                //xóa
                        Route::get('destroy/{id}','SliderController@destroy')->name('destroyslider');
                        // Route::get('showcategorydesc/{id}','CategoryProduct@showdesc')->name('showdesc');
                });
        });
    });

















