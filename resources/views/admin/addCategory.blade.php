@extends('adminindex')
@section('AddCategoryContent')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm danh mục</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tên danh mục *</label>
            <input type="text" name="category_product_name" class="form-control" id="exampleInputName1" placeholder="Tên danh mục..." required>
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Thương Hiệu *</label>
              <select name="category_brand_product" class="form-control" id="exampleSelectGender" required>
                @foreach ($brand as $brand)
                  <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @endforeach
              </select>
            </div> 
          <div class="form-group">
            <label for="exampleSelectGender">Hiển thị *</label>
              <select name="category_product_status" class="form-control" id="exampleSelectGender" required>
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
            </div>         
          <div class="form-group">
            <label for="exampleTextarea1">Mô tả *</label>
            <textarea name="category_product_desc" class="form-control" id="exampleTextarea1" rows="4" placeholder="Mô tả danh mục..." required></textarea>
          </div>
          
          <div class="row">
              <span class="m-1">
                  <button type="submit" class="btn btn-primary mr-2">Thêm danh mục</button>
              </span>
              <span class="m-1">
              <a href="{{route('allcategory')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection