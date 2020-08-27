<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProductModel;
use App\Models\BrandProductModel;

use Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;
use DB;
class CategoryProduct extends Controller
{
    public function addcategory()
    {
        $data['brand'] = BrandProductModel::all();
        return view('admin.addCategory',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcategory()
    {
        $all_category_product = DB::table('tbl_category_product')->join('tbl_brand','brand_id','=','tbl_category_product.category_brand')
                                                    ->orderBy('tbl_brand.brand_id','desc')
                                                    ->paginate(8);
        $show_category = view('admin.allCategory')->with('all_category_product',$all_category_product);
        return view('adminindex')->with('admin.allCategory',$show_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AddCateRequest $request)
    {
        $category = new CategoryProductModel();
        $category->category_name = $request->category_product_name;
        $category->category_slug = Str::slug($request->category_product_name);
        $category->category_brand = $request->category_brand_product;
        $category->category_status = $request->category_product_status;
        $category->category_desc = $request->category_product_desc;
        $category->save();
        Session::put('AddCategoryCorrect','Thêm danh mục thành công');
        return redirect()->route('addcategory');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('tbl_category_product')->where('category_id',$id)->count();
        if($result>0){
        $data['cate'] = CategoryProductModel::find($id);
        $data['brand'] = BrandProductModel::all();
        return view('admin.editCategory',$data);
        }else{
            return redirect()->route('allcategory');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateRequest $request, $id)
    {
        $category = CategoryProductModel::find($id);
        $category->category_name = $request->category_product_name;
        $category->category_slug = Str::slug($request->category_product_name);
        $category->category_brand = $request->category_brand_product;
        $category->category_desc = $request->category_product_desc;
        $category->save();
        session::put('EditCategoryCorrect','Sửa danh mục thành công');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryProductModel::destroy($id);
    }
    public function active($id){
        $category = CategoryProductModel::find($id);
        $category->category_status = '1';
        $category->save();
        return back();
    }
    public function unactive($id){
        $category = CategoryProductModel::find($id);
        $category->category_status = '0';
        $category->save();
        return back();
    }
    public function showdesc($id){
        $category = CategoryProductModel::find($id);
        return response()->json(['data' => $category], 200);
    }
    
}
