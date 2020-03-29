@extends('adminindex')
@section('SearchProduct')
<div class="container-fluid mt-3 mb-3">
    <div id="ui-view">
      <div>
        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <span class="col-md-4">
                    <i class="fa fa-edit"></i> Tìm kiếm sản phẩm
                </span>
                <span class="col-md-4">
                </span>
              </div>
              <div class="card-header-actions">
                <a class="card-header-action" href="https://datatables.net" target="_blank">
                </a>
              </div>
            </div>
            <div class="card-body">
            <h2>kết quả tìm kiếm của: {{$keyword}}</h2>
              <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                  {{-- <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length mb-3" id="DataTables_Table_0_length">
                    <a href="{{route('addproduct')}}" class="btn btn-dark">Thêm sản phẩm</a>
                    </div>
                  </div> --}}
                  <div class="col-sm-12 col-md-6">
                    {{-- <div id="DataTables_Table_0_filter" class="dataTables_filter">
                      <label>Search:
                        <div><input id="search_product" name="search_product" type="search"
                          class="form-control " placeholder="" aria-controls="DataTables_Table_0">
                          <div id="productlistsearch"></div></div>
                      </label>
                    </div>
                   
                    {{csrf_field()}} --}}
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-12 table-responsive" id="productlist">
                    <table class="table table-striped table-bordered datatable dataTable no-footer"
                      id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                      style="border-collapse: collapse !important">
                      <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Username: activate to sort column descending"
                            style="width: 20px;"><input type="checkbox" name="" id="checkall"></th>
                          <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Username: activate to sort column descending"
                            style="width: 235px;">Tên sản phẩm</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Username: activate to sort column descending"
                            style="width: 235px;">Mã sản phẩm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Date registered: activate to sort column ascending" style="width: 201px;">Giá sản phẩm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Date registered: activate to sort column ascending" style="width: 201px;">Giá sale sản phẩm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 98px;">Ảnh sản phẩm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 98px;">Danh mục sản phẩm</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 98px;">Hiệu sản phẩm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Actions: activate to sort column ascending" style="width: 209px;">Nổi bật</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Actions: activate to sort column ascending" style="width: 209px;">Trạng thái</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Actions: activate to sort column ascending" style="width: 209px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($productlist as $show_product)  
                          <tr role="row" class="odd">
                              <td><input type="checkbox" name="" class="checkOne"></td>
                              <td class="sorting_1">{{$show_product->prod_name}}</td>
                              <td>{{$show_product->prod_code}}</td>
                              <td>{{number_format($show_product->prod_price)}}</td>
                              <td>{{number_format($show_product->prod_sale)}}</td>
                              <td>
                                <img src="{{asset('storage/app/'.$show_product->prod_code.'/'.$show_product->prod_img)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                              </td>
                              <td>{{$show_product->category_name}}</td>
                              <td>{{$show_product->brand_name}}</td>
                              <td>@if ($show_product->prod_featured == 1)
                                  <b style="color:green;">Nổi bật<b>
                              @else
                                  <b style="color:red;">Không nổi bật<b>
                              @endif
                              </td>
                              <td>@if ($show_product->prod_status == 1)
                                      Còn hàng
                                  @else
                                      Hết hàng
                                  @endif
                              </td>
                              <td>
                              <a class="btn btn-primary btn-info-category" href="{{route('editproduct',$show_product->prod_id)}}">
                                    <i class="mdi mdi-table-edit"></i>
                              </a>
                              <button type="button" class="btn btn-success btn-info-product" data-toggle="modal" data-target="#modelId3" data-url="{{route('showinfoproduct',$show_product->prod_id)}}">
                                  <i class="mdi mdi-information-outline"></i>
                              </button>

                              <button class="btn btn-danger btn-destroy-product" data-url="{{URL::to('admin/product/allproduct/destroy/'.$show_product->prod_id.'/'.$show_product->prod_code)}}">
                                  <i class="mdi mdi-delete-forever"></i>
                              </button>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                      <ul class="pagination">
                        {{ $productlist->links() }}
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.ajaxshowdesc')
@endsection
