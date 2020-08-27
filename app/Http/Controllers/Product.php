<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditCateRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\ProductModel;
use App\Models\CategoryProductModel;
use App\Models\BrandProductModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class Product extends Controller
{

//FRONT-END CONTROLLER

//BACKEND CONTROLLER
    public function allProduct(){
        $data['productlist'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                      ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                      ->orderBy('vp_product.prod_id','desc')
                                                      ->paginate(8);
        return view('admin.allProduct',$data);
    }
    public function getAddProduct(){
        $data_cate['catelist'] = CategoryProductModel::all();
        $data_brand['brandlist'] = BrandProductModel::all();
        return view('admin.addProduct', $data_cate, $data_brand);
    }
    public function postAddProduct(AddProductRequest $request){
        $filefolder = $request->code;
        $filename = $request->img->getClientOriginalName();
        $product = new ProductModel();
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        $product->prod_code = $request->code;
        $product->prod_price = $request->price;
        $product->prod_sale = $request->price_sale;
        $product->prod_img = $filename;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        $product->save();
        $request->img->storeAs($filefolder,$filename);
        Session::put('AddProductCorrect','Thêm sản phẩm thành công');
        return back();
    }
    public function show($id){
        $item = ProductModel::where('prod_id',$id)->count();
        if($item == 0){
            return abort(404);
        }
        $data['product'] = ProductModel::find($id);
        $data['listcate'] = CategoryProductModel::all();
        $data['listbrand'] = BrandProductModel::all();
        return view('admin.editProduct',$data);
    }
    public function update(EditProductRequest $request, $id){
        $filefolder = $request->code;
        $product = ProductModel::find($id);
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_sale = $request->price_sale;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $product->prod_img = $filename;
            $request->img->storeAs($filefolder,$filename);
        }
        $product->save();
        Session::put('EditProductCorrect','Sửa sản phẩm thành công');
        return back();
    }
    public function showinfo($id){
        $product = ProductModel::find($id);
        return response()->json(['data' => $product], 200);
    }
    public function destroy($id,$code){
        ProductModel::destroy($id);
        Storage::deleteDirectory($code);
        return back();
    }

}
