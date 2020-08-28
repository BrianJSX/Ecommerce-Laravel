<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\OrderModel;
use Auth;
use CreateTblAdmin;
use DB;
use Session;
//Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{
    public function permission(){
       return "ok";
    }
    public function admin(){
        return view('adminlogin');
    }
    public function dashboard(){
        $product = DB::table('vp_product')->count();
        $category = DB::table('tbl_category_product')->count();
        $brand = DB::table('tbl_brand')->count();
        $order = DB::table('tbl_order')->count();
        $totalorder = DB::table("tbl_order")->get()->sum("order_total");
        $totalorderprocessed = DB::table("tbl_order")->where('order_status',1)->get()->sum("order_total");
        $totalorderunprocessed = DB::table("tbl_order")->where('order_status',0)->get()->sum("order_total");

        $data['countproductadmin'] = $product;
        $data['countcategoryadmin'] = $category;
        $data['countbrandadmin'] = $brand;
        $data['orderdetail'] = OrderModel::orderBy('order_id','desc')->paginate(10);
        $data['countorder'] = $order;
        $data['ordertotal'] = $totalorder;
        $data['ordertotalprocessed'] = $totalorderprocessed;
        $data['ordertotalunprocessed'] = $totalorderunprocessed;

        return view('admin.Dashboard',$data);
    }
    public function loginadmin(Request $request){

        $request = $request->only('email', 'password');        // return $data;
        if (Auth::attempt($request)) {
            $users = Auth::user();
            $checkrole = $users->hasRole('super_admin');
            if($checkrole){
                session::put('admin_id',$users->id);
                session::put('admin_name',$users->name);
                return Redirect::to('admin/dashboard');
            }else{
                session::put('guest_id',$users->id);
                session::put('guest_name',$users->name);
                return Redirect::to('guest');
            }
        } else{
            session::put('message','Tài khoản hoặc mật khẩu không chính xác');
            return Redirect::to('admin')->withInput();
        }
    }
    public function logoutadmin(){
        $admin_id = Session::has('admin_id');
        if($admin_id){
            session::put('admin_id', Null);
            session::put('admin_name', Null);
            return Redirect::to('admin');
        }else{
            session::put('guest_id', Null);
            session::put('guest_name', Null);
            return Redirect::to('admin');
        }
           
    }
    public function processed($id){
        $order = OrderModel::find($id);
        $order->order_status = '1';
        $order->save();
        return back();
    }
    public function unprocessed($id){
        $order = OrderModel::find($id);
        $order->order_status = '0';
        $order->save();
        return back();
    }
    public function searchproduct(Request $request){
        $result = $request->search_product;
        $results = str_replace(' ','%',$result);
        $data['keyword'] = $result;
        $data['productlist'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                      ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                ->where('prod_name','LIKE','%'.$results.'%')
                                                ->orwhere('prod_code','LIKE','%'.$results.'%')
                                                ->paginate(10);
        $data['productlist']->appends(['search_product' => $result]);
        return view('admin.searchproduct',$data);
        // dd($data);

    }

}
