@extends('adminindex')
@section('AddSliderContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sửa Slider</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tiêu Đề</label>
          <input type="text" name="slider_title" class="form-control" id="exampleInputName1" placeholder="Tên tiêu đề..." value="{{$slider->slider_title}}" required>
          </div>
            <div class="form-group">
                <label for="">Slider sản phẩm mới *</label>
                  <select name="slider_status_new" class="form-control" id="exampleSelectGender" required>
                    <option @if ($slider->slider_status_new == 1) selected @endif value="1">Hiển thị</option>
                    <option  @if ($slider->slider_status_new == 0) selected @endif value="0">Ẩn</option>
                  </select>
                </div>  
            <div class="form-group">
                
                <label>Ảnh slider *</label><br>
                <img class="animated" src="{{asset('storage/app/SliderImages/'.$slider->slider_img)}}" alt="slider images" width="500px" >

                <input type="file" name="slider_img" class="file-upload-default">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled="" value="{{$slider->slider_img}}" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>       
            <div class="form-group">
                <label for="">Mô tả chi tiết *</label>
                <textarea name="slider_content" class="form-control" name="" id="" rows="3" placeholder="Mô tả chi tiết">{{$slider->slider_content}}</textarea>
            </div>
            <div class="form-group">
              <label for="">Links</label>
            <input type="text" name="slider_links" id="" class="form-control" value="{{$slider->slider_links}}" placeholder="https://diennuocphucloc.com/slider/3/4" aria-describedby="helpId" required>
            </div>
          <div class="row">
              <span class="m-1">
                  <button type="submit" class="btn btn-primary mr-2">Sửa</button>
              </span>
              <span class="m-1">
              <a href="{{route('allslider')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection