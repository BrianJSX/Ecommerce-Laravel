@extends('adminindex')
@section('editBrand')
<div class="col-8 grid-margin stretch-card mt-3 mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">sửa thương hiệu</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputName1">Tên Thương Hiệu *</label>
          <input type="text" name="brand_product_name" class="form-control" id="exampleInputName1" placeholder="Tên danh mục..." value="{{$brand->brand_name}}" required>
          </div>
          <!--<div class="form-group">-->
          <!--    <label for="exampleSelectGender">Danh mục *</label>-->
          <!--      <select name="brand_product_category" class="form-control" id="exampleSelectGender" required>-->
          <!--        @foreach ($category as $category)-->
          <!--          <option value="{{$category->category_id}}" @if($category->category_id == $brand->brand_category) selected @endif >{{$category->category_name}}</option>-->
          <!--        @endforeach-->
          <!--      </select>-->
          <!--    </div> -->
          <div class="form-group">
            <label for="exampleTextarea1">Mô tả *</label>
          <textarea name="brand_product_desc" class="form-control" id="exampleTextarea1" rows="4" placeholder="Mô tả danh mục..." required>{{$brand->brand_desc}}</textarea>
          </div>
          <div class="row">
            <span class="m-1">
                <button type="submit" class="btn btn-primary mr-2">Sửa Thương Hiệu</button>
            </span>
            <span class="m-1">
            <a href="{{route('allbrand')}}"class="btn btn-danger mr-2">Hủy</a>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
