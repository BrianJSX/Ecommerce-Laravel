<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CategoryProductModel;
use App\Models\BrandProductModel;
use App\Models\SliderModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Cart;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['categoryindex'] = DB::table('tbl_category_product')
                                ->take(12)
                                ->orderBy('category_id','desc')
                                ->get();
        $data['categoryshopall'] = DB::table('tbl_category_product')->get();
        $data['brandshopall'] = DB::table('tbl_brand')->get();
        $data['brandindex'] = DB::table('tbl_brand')->take(12)
                                                    ->orderBy('brand_id','desc')
                                                    ->get();
        $data['sliderindex'] = SliderModel::all();
        $data['url'] = URL::current();
        view()->share($data);
    }
}
