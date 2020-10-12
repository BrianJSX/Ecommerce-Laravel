<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\ProductModel;
use DB;
use Cart;
class HomeControler extends Controller
{

    public function index(){
        $data['productnew'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                    ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                    ->orderBy('vp_product.prod_id','desc')
                                                    ->limit(2)
                                                    ->get();
        $data['productfeatured'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                        ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                        ->orderByDesc("vp_product.updated_at")
                                                        ->where('vp_product.prod_featured',1)
                                                        ->limit(62)
                                                        ->get();
        $data['newsindex'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->select('A.news_id','A.news_title','A.news_slug','A.news_description','A.news_author','A.news_img','A.news_status','A.created_at','B.name')
                                                    ->orderBy('A.news_id','desc')
                                                    ->limit(3)
                                                    ->get();
         //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart

        return view('pages.index-content',$data);
    }
    public function showdetailindex($slug){
        $result = DB::table('vp_product')->where('prod_slug',$slug)->count();
        if ($result>0) {

            $data['productdetail'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                            ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('vp_product.prod_slug',$slug)
                                                            ->get();
            $categoryGenerally = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                            ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('vp_product.prod_slug',$slug)
                                                            ->value('category_id');
            $productCount =  DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                    ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                    ->where('tbl_category_product.category_id',$categoryGenerally)
                                                    ->where('vp_product.prod_slug', '!=', $slug )
                                                    ->orderBy('vp_product.prod_id','desc')
                                                    ->count();
            if($productCount > 5) {
                $data['ProductGenerally'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                              ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('tbl_category_product.category_id',$categoryGenerally)
                                                            ->where('vp_product.prod_slug', '!=', $slug )
                                                            ->orderBy('vp_product.prod_id','desc')
                                                            ->get()
                                                            ->random(5);
            } else {
                $data['ProductGenerally'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                              ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('tbl_category_product.category_id',$categoryGenerally)
                                                            ->where('vp_product.prod_slug', '!=', $slug )
                                                            ->orderBy('vp_product.prod_id','desc')
                                                            ->get();
            }

            $data['producttitle'] = DB::table('vp_product')->where('prod_slug',$slug)->value('prod_name');
            $data['productimageOg'] = DB::table('vp_product')->where('prod_slug',$slug)->value('prod_img');
            $data['productcodeOg'] = DB::table('vp_product')->where('prod_slug',$slug)->value('prod_code');





        //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart

            return view('pages.product-detail',$data);
        }else{
            return redirect()->route('home');
        }
    }
    public function showshopindex(){
        $data['productshop'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                      ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                    ->orderBy('vp_product.prod_id','desc')
                                                    ->paginate(32);
        //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart
        return view('pages.shop',$data);
    }
    public function getsearch(Request $request){
        $result = $request->result;
        $results = str_replace(' ','%',$result);
        $data['keyword'] = $result;
        $data['items'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                ->where('prod_name','LIKE','%'.$results.'%')
                                                ->orwhere('prod_code','LIKE','%'.$results.'%')
                                                ->paginate(32);
        $data['items']->appends(['result' => $result]);

        //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart
        return view('pages.search',$data);
    }
    public function getcategoryshop($slug){
        $result = DB::table('tbl_category_product')->where('category_slug',$slug)->count();
        if ($result>0) {
            $data['productcategory'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                              ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('tbl_category_product.category_slug',$slug)
                                                            ->orderBy('vp_product.prod_id','desc')
                                                            ->paginate(32);
            $data['categoryname'] = DB::table('tbl_category_product')->where('category_slug',$slug)->get();
            $brandcate = DB::table('tbl_category_product')->where('category_slug',$slug)->value('category_brand');
            $data['categoryofbrand'] =  DB::table('tbl_category_product')->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                                ->where('tbl_brand.brand_id',$brandcate)
                                                                ->get();
        //Get Cart detail
            $data['categorytitle'] = DB::table('tbl_category_product')->where('category_slug',$slug)->value('category_name');
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart

            return view('pages.category-shop',$data);
        }else{
            return redirect()->route('home');
        }
    }
    public function getbrandshop($slug){
        $result = DB::table('tbl_brand')->where('brand_slug',$slug)->count();
        if ($result>0) {
            $data['productbrand'] = DB::table('vp_product')->join('tbl_category_product','vp_product.prod_cate','=','tbl_category_product.category_id')
                                                            ->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                            ->where('tbl_brand.brand_slug',$slug)
                                                            ->orderBy('vp_product.prod_id','desc')
                                                            ->paginate(32);
            $data['brandname'] = DB::table('tbl_brand')->where('brand_slug',$slug)->get();
            $data['categoryofbrand'] =  DB::table('tbl_category_product')->join('tbl_brand','tbl_category_product.category_brand','=','tbl_brand.brand_id')
                                                                ->where('tbl_brand.brand_slug',$slug)
                                                                ->get();
        //Get Cart detail
            $data['brandtitle'] = DB::table('tbl_brand')->where('brand_slug',$slug)->value('brand_name');
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart

            return view('pages.brand-shop',$data);
        }else{
            return redirect()->route('home');
        }
    }
    public function getnews($slug){
        $result = DB::table('tbl_news')->where('news_slug',$slug)->count();
        if ($result>0) {
            $data['newsdetail'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->orderBy('A.news_id','desc')
                                                    ->where('news_slug',$slug)
                                                    ->get();
            $data['newsrecent'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->orderBy('A.news_id','desc')
                                                    ->limit(8)
                                                    ->get();
            $data['newstitle'] =  DB::table('tbl_news')->where('news_slug',$slug)->value('news_title');
            $data['newsdate'] =  DB::table('tbl_news')->where('news_slug',$slug)->value('created_at');
            $data['newsImage'] = DB::table('tbl_news')->where('news_slug',$slug)->value('news_img');

        //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart

            return view('pages.newsdetail',$data);
        }else{
            return redirect()->route('home');
        }
    }
    Public function getnewsblog(){
        $data['newsblog'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->select('A.news_id','A.news_title','A.news_slug','A.news_description','A.news_author','A.news_img','A.news_status','A.created_at','B.name')
                                                    ->orderBy('A.news_id','desc')
                                                    ->paginate(3);
        $data['newsrecent'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->orderBy('A.news_id','desc')
                                                    ->limit(4)
                                                    ->get();
         //Get Cart detail
            $cartcontent = Cart::getContent();
            $data['totalsub'] = Cart::getSubTotal();
            $data['total'] = Cart::getTotal();
            $data['productcart'] = $cartcontent;
            $data['countcart'] = count($cartcontent);
        //end Get cart
        return view('pages.news',$data);
    }

}
