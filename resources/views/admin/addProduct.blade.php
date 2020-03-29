@extends('adminindex')
@section('AddProductContent')
<div class="col-12 grid-margin stretch-card">

    <div class="card">
      <div class="card-body">
        @include('errors.note')
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label >Tên sản phẩm *</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Đèn leg siêu sáng (MEXP)" required>
          </div>
          <div class="form-group">
            <label>Mã sản phẩm *</label>
            <input name="code" type="text" class="form-control" id="code" placeholder="MXPS" required>
          </div>
          <div class="form-group">
            <label>Giá sản phẩm *</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="100000000" required>
          </div>
          <div class="form-group">
              <label>Giá sale sản phẩm *</label>
              <input name="price_sale" type="number" class="form-control" id="price_sale" placeholder="100000000" required>
            </div>
          <div class="form-group">
            <label >Phụ kiện *</label>
            <input name="accessories" type="text" class="form-control" id="accessories" placeholder="Phụ kiện" required>
          </div>
          <div class="form-group">
            <label >Bảo Hành *</label>  
            <input type="text" name="warranty" class="form-control" id="wanrranty" placeholder="12 tháng" required>
          </div>
          <div class="form-group">
            <label >Banner index *</label>
            <input type="text" name="promotion" class="form-control" id="promotion" placeholder="50%" required>
          </div>
          <div class="form-group">
            <label >Tình trạng *</label>
            <input type="text" name="condition" class="form-control" id="condition" placeholder="Hàng mới 100%" required>
          </div>
          <div class="form-group">
            <label>Ảnh sản phẩm (> 600 x 600px) *</label>
            <input type="file" name="img" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label>Mô tả chi tiết *</label>
            <textarea class="ckeditor" name="description" id="description" rows="4" >Không có mô tả</textarea>
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
          <div class="form-group">
            <label >Trạng thái *</label>
              <select class="form-control" id="status" name="status" required>
                <option value="1">Còn Hàng</option>
                <option value="0">Hết Hàng</option>
              </select>
            </div>
          <div class="form-group">
            <label >Danh mục sản phẩm *</label>
              <select class="form-control" id="status" name="cate" required>
                  @foreach ($catelist as $show_cate)
                    <option value="{{$show_cate->category_id}}">{{$show_cate->category_name}}</option>
                  @endforeach
              </select>
            </div>
            <!--<div class="form-group">-->
            <!--        <label >Hiệu sản phẩm *</label>-->
            <!--          <select class="form-control" id="status" name="brand" required>-->
            <!--            @foreach ($brandlist as $show_brand)-->
            <!--                <option value="{{$show_brand->brand_id}}">{{$show_brand->brand_name}}</option>-->
            <!--            @endforeach-->
            <!--          </select>-->
            <!--        </div>-->
            <div class="col-md-6">
                    <label>Sản phẩm nổi bật *</label>
                    <div class="form-group">
                      <select class="form-control" id="status" name="featured" required>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                      </select>
                    </div>
            </div>
          <button type="submit" class="btn btn-primary mr-2">Thêm sản phẩm</button>
          <a href="{{route('allproduct')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
    
@endsection