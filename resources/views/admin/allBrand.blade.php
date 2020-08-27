@extends('adminindex')
@section('allBrand')
<div class="container-fluid mt-3 mb-3">
    <div id="ui-view">
      <div>
        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <span class="col-md-4">
                    <i class="fa fa-edit"></i> Tất cả thương hiệu
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
              <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length mb-3" id="DataTables_Table_0_length">
                    <a href="{{route('addbrand')}}" class="btn btn-dark">Thêm Thương hiệu</a>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search"
                          class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
                          
                    </div>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 table-responsive">
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
                            style="width: 235px;">Tên danh mục</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Date registered: activate to sort column ascending" style="width: 201px;">Ngày thêm</th>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 98px;">Hiển thị</th>
                            <!--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"-->
                            <!--aria-label="Status: activate to sort column ascending" style="width: 98px;">Danh mục</th>-->
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="Actions: activate to sort column ascending" style="width: 209px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($all_brand_product as $item => $show_brand)  
                          <tr role="row" class="odd">
                              <td><input type="checkbox" name="" class="checkOne"></td>
                              <td class="sorting_1">{{ $show_brand->brand_name }}</td>
                              <td>{{ $show_brand->created_at }}</td>
                              <td>
                                <?php 
                                 if ($show_brand->brand_status == 1) {
                                  ?>
                                   {{-- <button value="{{$show_category->category_id}}" data-url="{{ url('admin/unactive_cat', $show_category->category_id) }}" id="bt-active" class="btn btn-success"><span class='badge'>Hiển thị</span></button> --}}
                                 <a href="{{route('unactiveBrand',$show_brand->brand_id)}}"><span class='badge badge-success'>Hiển thị</span></a>
                                <?php
                                 }else{
                                ?>  
                                   {{-- <button data-url="{{url('admin/active_cat', $show_category->category_id) }}" id="bt-unactive" class="btn btn-danger"><span class='badge'>Ẩn</span></button> --}}
                                 <a href="{{route('activeBrand',$show_brand->brand_id)}}"><span class='badge badge-danger'>Ẩn</span></a>
                                <?php
                                 }
                                ?>
                              </td>
                              <td>
                              <a class="btn btn-primary btn-info-category" href="{{route('editbrand',$show_brand->brand_id)}}">
                                    <i class="mdi mdi-table-edit"></i>
                              </a>
                              <button type="button" class="btn btn-success btn-info-brand" data-toggle="modal" data-target="#modelId2" data-url="{{route('showdescBrand',$show_brand->brand_id)}}">
                                  <i class="mdi mdi-information-outline"></i>
                              </button>

                              <button type="button" class="btn btn-danger btn-destroy-brand"  data-url="{{route('destroyBrand',$show_brand->brand_id)}}">
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
                        {{ $all_brand_product->links() }}
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