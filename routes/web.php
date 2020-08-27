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
// use App\Models\users;



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
//         $users = new users();
//         $users->name = 'Onion';
//         $users->email = 'minhho.technology@gmail.com';
//         $users->password = bcrypt('lhmdtlla');
//         $users->save();
// });

//----------------------------------------------------------------------------------------------------------------//
// Admin Sever

Route::get('admin','AdminController@admin')->name('admin')->middleware('checkloginadmin');
Route::post('admin','AdminController@loginadmin')->name('adminlogin')->middleware('checkloginadmin');

Route::group(['prefix' => 'admin','middleware' => 'checklogindashboard'], function () {
        Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
        Route::get('/dashboard/processed/{id}','AdminController@processed')->name('dashboardprocessed');
        Route::get('/dashboard/unprocessed/{id}','AdminController@unprocessed')->name('dashboardunprocessed');

        Route::get('/logout','AdminController@logoutadmin')->name('logout');
        Route::get('/search','AdminController@searchproduct')->name('searchproduct');
        
        //Đơn hàng
        

        //Danh mục sản phẩm
        Route::group(['prefix' => 'category','middleware' => 'checklogindashboard'], function () {
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

        //Hiệu sản phẩm
        Route::group(['prefix' => 'brand','middleware' => 'checklogindashboard'], function () {
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
        
        //Sản phẩm
        Route::group(['prefix' => 'product','middleware' => 'checklogindashboard'], function () {
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

        Route::group(['prefix' => 'news','middleware' => 'checklogindashboard'], function () {
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
        Route::group(['prefix' => 'slider','middleware' => 'checklogindashboard'], function () {
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
   
   















