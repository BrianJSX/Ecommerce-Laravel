<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderModel;
use Session;
use DB;

class SliderController extends Controller
{
    public function allslider(){
        $data['slider'] = SliderModel::all();
        return view('admin.allSlider',$data);
    }
    public function addslider(){
        return view('admin.addSlider');
    }
    public function create(Request $request)
    {
        $slider = new SliderModel();
        $filename = $request->slider_img->getClientOriginalName();
        $slider->slider_title = $request->slider_title;
        $slider->slider_status = $request->slider_status;
        $slider->slider_status_new = $request->slider_status_new;
        $slider->slider_content = $request->slider_content;
        $slider->slider_links = $request->slider_links;
        $slider->slider_img = $filename;
        $request->slider_img->storeAs('SliderImages',$filename);
        $slider->save();
        Session::put('AddSliderCorrect','Thêm slider thành công');
        return redirect()->route('addnews');
    }
    public function update(Request $request,$id)
    {
        $slider = SliderModel::find($id);
        $slider->slider_title = $request->slider_title;
        $slider->slider_status_new = $request->slider_status_new;
        $slider->slider_content = $request->slider_content;
        $slider->slider_links = $request->slider_links;
        if($request->hasFile('slider_img')){
            $filename = $request->slider_img->getClientOriginalName();
            $slider->slider_img = $filename;
            $request->slider_img->storeAs('SliderImages',$filename);
        }
        $slider->save();
        Session::put('EditSliderCorrect',' sửa slider thành công');
        return redirect()->route('editslider',$id);
        
    }
    public function show($id)
    {
        $result = DB::table('tbl_slider')->where('slider_id',$id)->count();
        if($result>0){
        $data['slider'] = SliderModel::find($id);
        return view('admin.editSlider',$data);
        }else{
            return redirect()->route('allslider');
        }

    }
    public function active($id){
        $slider = SliderModel::find($id);
        $slider->slider_status = '1';
        $slider->save();
        return back();
    }
    public function unactive($id){
        $slider = SliderModel::find($id);
        $slider->slider_status = '0';
        $slider->save();
        return back();
    }
    public function showcontent($id){
        $brand = SliderModel::find($id);
        return response()->json(['data' => $brand], 200);
    }
    public function destroy($id)
    {
        SliderModel::destroy($id);
    }
    
}
