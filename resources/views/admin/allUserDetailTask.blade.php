@extends('adminindex')
@section('AllTask')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body dashboard-tabs p-0">
              <ul class="nav nav-tabs px-4" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Thống kê</a>
                </li>
              </ul>
              <div class="tab-content py-0 px-0">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-calendar-multiple-check mr-3 icon-lg text-warning"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Tổng tiền trong năm</small>
                          <h5 class="mr-2 mb-0">{{number_format($salaryYear)}}</h5>
                        </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-currency-usd mr-3 icon-lg text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Tổng tiền trong tháng</small>
                        <h5 class="mr-2 mb-0">{{number_format($salaryMonth)}}</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-checkbox-marked-circle mr-3 icon-lg text-success"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Số TASK hoàn thành</small>
                        <h5 class="mr-2 mb-0">{{$taskComplete}}</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-close-circle mr-3 icon-lg text-danger"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Số TASK chưa hoàn thành</small>
                        <h5 class="mr-2 mb-0">{{$taskUnComplete}}</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
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
            <p class="card-title">Hôm nay phải làm</p>
            <div class="table-responsive">
                <table id="recent-purchases-listing-today" class="table">
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
                        <th>ID User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasksToday as $task_today)
                    <tr @if($task_today->pivot->status == 0 || $task_today->pivot->day_off == 1) style="background-color: #f5c4c4" @else style="background-color: #d0f5c4; @endif" >
                        <td>{{$task_today->id}}</td>
                        <td>{{$task_today->job}}</td>
                        <td>{{$task_today->address}}</td>
                        <td>{{\Carbon\Carbon::parse($task_today->day_work)->format('d/m/Y')}}</td>
                        <td>{{number_format($task_today->money)}}</td>
                        <td>
                            @if($task_today->pivot->status == 0)
                                <label class="badge badge-danger">Chưa làm</label>
                            @else
                                <label class="badge badge-success">Hoàn thành</label>
                            @endif

                        </td>
                        {{-- <td>
                            @if($task_today->pivot->day_off == 0)
                                <button type="button" class="btn btn-success">Không vắng</button>
                            @else
                                <button type="button" class="btn btn-danger">Vắng</button>
                            @endif
                        </td> --}}
                        <td>
                            @if($task_today->pivot->status == 0)
                                <button onclick="location.href='{{route('taskUserWork',[$task_today->id, $userId])}}'" type="button" class="btn btn-success">Ấn hoàn thành</button>
                            @else
                                <button onclick="location.href='{{route('taskUserNotWork',[$task_today->id, $userId])}}'" type="button" class="btn btn-outline-danger">Ấn chưa làm</button>
                            @endif
                        </td>
                        <td>{{$task_today->pivot->user_complete}}</td>
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
    <div class="row mt-4">
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
                        <th>ID User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr @if($task->pivot->status == 0 || $task->pivot->day_off == 1) style="background-color: #f5c4c4" @else style="background-color: #d0f5c4; @endif" >
                        <td>{{$task->id}}</td>
                        <td>{{$task->job}}</td>
                        <td>{{$task->address}}</td>
                        <td>{{\Carbon\Carbon::parse($task->day_work)->format('d/m/Y')}}</td>
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
                                <button onclick="location.href='{{route('taskUserWork',[$task->id, $userId])}}'" type="button" class="btn btn-success">Ấn hoàn thành</button>
                            @else
                                <button onclick="location.href='{{route('taskUserNotWork',[$task->id, $userId])}}'" type="button" class="btn btn-outline-danger">Ấn chưa làm</button>
                            @endif
                        </td>
                        <td>{{$task->pivot->user_complete}}</td>
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

