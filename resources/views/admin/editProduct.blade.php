@extends('adminindex')
@section('editProduct')
<div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @include('errors.note')
            <h4 class="card-title">Thêm sản phẩm</h4>
            <form method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label >Tên sản phẩm *</label>
              <input value="{{$product->prod_name}}" name="name" type="text" class="form-control" id="name" placeholder="Đèn leg siêu sáng (MEXP)" required>
              </div>
              <div class="form-group">
                <label>Mã sản phẩm (Not corrected)</label>
                <input value="{{$product->prod_code}}" name="code" type="text" class="form-control" id="code" placeholder="MXPS" readonly>
              </div>
              <div class="form-group">
                <label>Giá sản phẩm *</label>
                <input value="{{$product->prod_price}}" name="price" type="number" class="form-control" id="price" placeholder="100000000" required>
              </div>
              <div class="form-group">
              <label>Giá sale sản phẩm *</label>
              <input value="{{$product->prod_sale}}" name="price_sale" type="number" class="form-control" id="price_sale" placeholder="100000000" required>
            </div>
              <div class="form-group">
                <label >Phụ kiện *</label>
                <input value="{{$product->prod_accessories}}" name="accessories" type="text" class="form-control" id="accessories" placeholder="Phụ kiện" required>
              </div>
              <div class="form-group">
                <label >Bảo Hành *</label>  
                <input value="{{$product->prod_warranty}}" type="text" name="warranty" class="form-control" id="wanrranty" placeholder="12 tháng" required>
              </div>
              <div class="form-group">
                <label >bandner *</label>
                <input value="{{$product->prod_promotion}}" type="text" name="promotion" class="form-control" id="promotion" placeholder="Khuyến mãi" required>
              </div>
              <div class="form-group">
                <label >Tình trạng *</label>
                <input value="{{$product->prod_condition}}" type="text" name="condition" class="form-control" id="condition" placeholder="Hàng mới 100%" required>
              </div>
              <div class="form-group">
                  <label>Ảnh sản phẩm *</label>
                <div class="">
                    <img src="{{asset('storage/app/'.$product->prod_code.'/'.$product->prod_img)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="600px" height="600px">
                </div>
                <input type="file" name="img" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input value="{{$product->prod_img}}" type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label>Mô tả chi tiết *</label>
                <textarea class="ckeditor" name="description" id="description" rows="4" >{{$product->prod_description}}</textarea>
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
                    <option @if ($product->prod_status == 1) selected @endif value="1">Còn Hàng</option>
                    <option @if ($product->prod_status == 0) selected @endif value="0">Hết Hàng</option>
                  </select>
                </div>
              <div class="form-group">
                <label >Danh mục sản phẩm *</label>
                  <select class="form-control" id="status" name="cate" required>
                      @foreach ($listcate as $cate)
                            <option value="{{$cate->category_id}}" @if ($cate->category_id == $product->prod_cate) selected @endif>{{$cate->category_name}}</option>
                      @endforeach
                  </select>
                </div>
                <!--<div class="form-group">-->
                <!--        <label >Hiệu sản phẩm *</label>-->
                <!--          <select class="form-control" id="status" name="brand" required>-->
                <!--                @foreach ($listbrand as $brand)-->
                <!--                <option value="{{$brand->brand_id}}" @if ($brand->brand_id == $product->prod_brand) selected @endif>{{$brand->brand_name}}</option>-->
                <!--          @endforeach-->
                <!--          </select>-->
                <!--        </div>-->
                <div class="">
                        <label>Sản phẩm nổi bật *</label>
                        <div class="form-group">
                          <select class="form-control" id="featured" name="featured" required>
                                <option @if($product->prod_featured == 1) selected @endif value="1">Nổi bật</option>
                                <option @if($product->prod_featured == 0) selected @endif value="0">Không nổi bật</option>
                          </select>
                        </div>
                </div>
              <button type="submit" class="btn btn-primary mr-2">Lưu</button>
              <a href="{{route('allproduct')}}" class="btn btn-light">Hủy</a>
            </form>
          </div>
        </div>
      </div>
        
    
@endsection