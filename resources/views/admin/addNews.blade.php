@extends('adminindex')
@section('AddNewsContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Tin tức</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tiêu Đề</label>
            <input type="text" name="news_tiltle" class="form-control" id="exampleInputName1" placeholder="Tên danh mục..." required>
          </div>
          <div class="form-group">
            <label for="">Hiển thị *</label>
              <select name="news_status" class="form-control" id="exampleSelectGender" required>
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
            </div>  
            <div class="form-group">
                <label>Ảnh sản phẩm *</label>
                <input type="file" name="news_img" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>       
            <div class="form-group">
                <label>Mô tả chi tiết *</label>
                <textarea class="ckeditor" name="news_description" id="description" rows="4" >Không có mô tả</textarea>
              </div>
              <script type="text/javascript">
                var editor = CKEDITOR.replace('description',{
                    language:'vi',
                    filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                    filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageBrowseUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserImageBrowseUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
              </script>
          <div class="row">
              <span class="m-1">
                  <button type="submit" class="btn btn-primary mr-2">Thêm tin tức</button>
              </span>
              <span class="m-1">
              <a href="{{route('allnews')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection