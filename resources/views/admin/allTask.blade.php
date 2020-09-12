@extends('adminindex')
@section('AllTask')
<div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
              <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                  <i class="mdi mdi-home text-muted hover-cursor"></i>
                  <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                  <p class="text-primary mb-0 hover-cursor"></p>
                </div>
              </div>
              {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                  <i class="mdi mdi-download text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                  <i class="mdi mdi-clock-outline text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                  <i class="mdi mdi-plus text-muted"></i>
                </button>
                <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <table id="" class="table">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Họ tên</th>
                                  <th>Số điện thoại</th>
                                  <th>Email</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Task</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Công việc</th>
                          <th>Địa chỉ</th>
                          <th>Vắng</th>
                          <th>Ngày làm</th>
                          <th>status</th>
                          <th>Tiền công</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->job}}</td>
                            <td>{{$task->address}}</td>
                            <td>{{$task->day_off}}</td>
                            <td>{{$task->day_work}}</td>
                            <td>sadsa</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                  <ul class="pagination">
                      {{-- {{ $orderdetail->links() }} --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

