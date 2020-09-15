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
                          <th>Ngày làm</th>
                          <th>Tiền công</th>
                          <th>Tình trạng</th>
                          {{-- <th>Vắng</th> --}}
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr @if($task->pivot->status == 0 || $task->pivot->day_off == 1) style="background-color: #f5c4c4" @else style="background-color: #d0f5c4; @endif" >
                            <td>{{$task->id}}</td>
                            <td>{{$task->job}}</td>
                            <td>{{$task->address}}</td>
                            <td>{{$task->day_work}}</td>
                            <td>{{number_format($task->money)}}</td>
                            <td>
                                @if($task->pivot->status == 0)
                                    <label class="badge badge-danger">Chưa làm</label>
                                @else
                                    <label class="badge badge-success">Hoàn thành</label>
                                @endif

                            </td>
                            {{-- <td>
                                @if($task->pivot->day_off == 0)
                                    <button type="button" class="btn btn-success">Không vắng</button>
                                @else
                                    <button type="button" class="btn btn-danger">Vắng</button>
                                @endif
                            </td> --}}
                            <td>
                                @if($task->pivot->status == 0)
                                    <button onclick="location.href='{{route('taskUserWork',[$task->id, $userId])}}'" type="button" class="btn btn-outline-success">Ấn hoàn thành</button>
                                @else
                                    <button onclick="location.href='{{route('taskUserNotWork',[$task->id, $userId])}}'" type="button" class="btn btn-outline-danger">Ấn chưa làm</button>
                                @endif
                            </td>
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

