<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandProductModel;
use App\Models\CategoryProductModel;
use Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\EditBrandRequest;
use Illuminate\Support\Str;
use DB;

class BrandProduct extends Controller
{
    //
    public function addbrand()
    {
        $data['category'] = CategoryProductModel::all();
        return view('admin.addBrand',$data);
    }

    public function allbrand(){
        $all_brand_product = DB::table('tbl_brand')->orderBy('tbl_brand.brand_id','desc')
                                                    ->paginate(8);
        $show_brand = view('admin.allBrand')->with('all_brand_product',$all_brand_product);
        return view('adminindex')->with('admin.allBrand',$show_brand);
    }
    public function show($id)
    {
        $result = DB::table('tbl_brand')->where('brand_id',$id)->count();
        if($result>0){
            $data['brand'] = BrandProductModel::find($id);
            $data['category'] = CategoryProductModel::all();
            return view('admin.editBrand',$data);
        }else{
            return redirect()->route('allbrand');
        }

    }
    public function create(AddBrandRequest $request)
    {
        $brand = new BrandProductModel();
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_slug = Str::slug($request->brand_product_name);
        $brand->brand_status = $request->brand_product_status;
        $brand->brand_desc = $request->brand_product_desc;
        $brand->save();
        Session::put('AddBrandCorrect','Thêm thương hiệu thành công');
        return redirect()->route('addbrand');

    }
    public function update(EditBrandRequest $request, $id)
    {
        $brand = BrandProductModel::find($id);
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_slug = Str::slug($request->brand_product_name);
        $brand->brand_desc = $request->brand_product_desc;
        $brand->save();
        session::put('EditBrandCorrect','Sửa thương hiệu thành công');
        return back();
    }
    public function active($id){
        $brand = BrandProductModel::find($id);
        $brand->brand_status = '1';
        $brand->save();
        return back();
    }
    public function unactive($id){
        $brand = BrandProductModel::find($id);
        $brand->brand_status = '0';
        $brand->save();
        return back();
    }
    public function showdesc($id){
        $brand = BrandProductModel::find($id);
        return response()->json(['data' => $brand], 200);
    }
    public function destroy($id)
    {
        BrandProductModel::destroy($id);
    }
}
