<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Str;
use DB;

class NewsController extends Controller
{
    public function allnews(){
       $data['allnews'] = DB::table('tbl_news as A')->join('users as B','A.news_author','=','B.id')
                                                    ->select('A.news_id','A.news_title','A.news_slug','A.news_description','A.news_author','A.news_img','A.news_status','A.created_at','B.name')
                                                    ->orderBy('A.updated_at','desc')
                                                    ->paginate(8);
                                                    // dd($data);
      return view('admin.allNews',$data);
    }
    public function addnews(){
        return view('admin.addNews');
    }
    public function create(AddNewsRequest $request)
    {
        $news = new NewsModel();
        $author = Session::get('admin_id');
        $filename = $request->news_img->getClientOriginalName();
        $news->news_title = $request->news_tiltle;
        $news->news_slug = Str::slug($request->news_tiltle);
        $news->news_status = $request->news_status;
        $news->news_description = $request->news_description;
        $news->news_author= $author;
        $news->news_img = $filename;
        $request->news_img->storeAs('NewsImages',$filename);
        $news->save();
        Session::put('AddNewsCorrect','Thêm tin tức thành công');
        return redirect()->route('addnews');
        
    }
    public function update(EditNewsRequest $request,$id)
    {
        $news = NewsModel::find($id);
        $author = Session::get('admin_id');
        $news->news_title = $request->news_tiltle;
        $news->news_slug = Str::slug($request->news_tiltle);
        $news->news_status = $request->news_status;
        $news->news_description = $request->news_description;
        $news->news_author= $author;
        if($request->hasFile('news_img')){
            $filename = $request->news_img->getClientOriginalName();
            $news->news_img = $filename;
            $request->news_img->storeAs('NewsImages',$filename);
        }
        $news->save();
        Session::put('EditNewsCorrect',' sửa tin tức thành công');
        return redirect()->route('editnews',$id);
        
    }
    public function show($id)
    {
        $result = DB::table('tbl_news')->where('news_id',$id)->count();
        if($result>0){
        $data['news'] = NewsModel::find($id);
        return view('admin.editNews',$data);
        }else{
            return redirect()->route('allcategory');
        }

    }
    public function active($id){
        $news = NewsModel::find($id);
        $news->news_status = '1';
        $news->save();
        return back();
    }
    public function unactive($id){
        $news = NewsModel::find($id);
        $news->news_status = '0';
        $news->save();
        return back();
    }
    public function destroy($id)
    {
        NewsModel::destroy($id);
    }
    
}
