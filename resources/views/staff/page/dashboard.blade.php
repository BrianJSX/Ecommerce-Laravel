@extends('staff.staffIndex')
@section('dashboard')
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
              <div class="header-body">
                <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tasks</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{route('view_dashboard_staff')}}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('view_dashboard_staff')}}">Dashboards</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">task</li> --}}
                      </ol>
                    </nav>
                  </div>
                  <div class="col-lg-6 col-5 text-right">
                    {{-- <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                  </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Lương năm</h5>
                                <span class="h2 font-weight-bold mb-0">{{number_format($salaryYear)}}</span>
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span> --}}
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Lương tháng</h5>
                                <span class="h2 font-weight-bold mb-0">{{number_format($salaryMonth)}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                <i class="ni ni-bag-17"></i>
                                </div>
                            </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                            {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span> --}}
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Đã làm</h5>
                                <span class="h2 font-weight-bold mb-0">{{$taskComplete}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-check-bold"></i>
                                </div>
                            </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                            {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span> --}}
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Chưa làm</h5>
                                <span class="h2 font-weight-bold mb-0">{{$taskUnComplete}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-fat-remove"></i>
                                </div>
                            </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                            {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span> --}}
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col">
                      <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                          <h3 class="mb-0">Hôm nay sẽ làm</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                          <table id="table_dashboard_staff" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <th scope="col" class="sort" data-sort="name">ID</th>
                                <th scope="col" class="sort" data-sort="budget">Công việc</th>
                                <th scope="col" class="sort" data-sort="status">Địa chỉ</th>
                                <th scope="col">Ngày làm</th>
                                <th scope="col" class="sort" data-sort="completion">Tiền công</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">action</th>
                            </thead>
                            <tbody class="list">
                                @foreach ($tasks_today as $task_today)
                                <tr @if($task_today->pivot->status == 0) style="background-color:#ffdcdc" @else style="background-color:#e1ffdc" @endif>
                                    <th scope="row">{{$task_today->id}}</th>
                                    <td class="budget">{{$task_today->job}}</td>
                                    <td>{{$task_today->address}}</td>
                                    <td>{{\Carbon\Carbon::parse($task_today->day_work)->format('d/m/Y')}}</td>
                                    <td>{{number_format($task_today->money)}}</td>
                                    <td>
                                        @if($task_today->pivot->status == 0)
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-danger"></i>
                                                <span class="status">Chưa làm</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">Đã làm</span>
                                            </span>
                                        @endif
                                    </td>
                                    @if ($task_today->pivot->status == 0)
                                    <td class="text-right">
                                        <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                  <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{route('task_complete_staff', $task_today->id)}}">Ấn hoàn thành</a>
                                          </div>
                                        </div>
                                      </td>
                                    @else
                                      <td>Không có hành động</td>
                                    @endif

                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Footer -->
                <footer class="footer pt-0">
                  <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                      <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                          <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                          <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                          <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                          <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </footer>
            </div>
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col">
                      <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                          <h3 class="mb-0">Tất cả công việc</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                          <table id="table_dashboard_staff_all" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <th scope="col" class="sort" data-sort="name">ID</th>
                                <th scope="col" class="sort" data-sort="budget">Công việc</th>
                                <th scope="col" class="sort" data-sort="status">Địa chỉ</th>
                                <th scope="col">Ngày làm</th>
                                <th scope="col" class="sort" data-sort="completion">Tiền công</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">action</th>
                            </thead>
                            <tbody class="list">
                                @foreach ($tasks as $task)
                                <tr @if($task->pivot->status == 0) style="background-color:#ffdcdc" @else style="background-color:#e1ffdc" @endif>
                                    <th scope="row">{{$task->id}}</th>
                                    <td class="budget">{{$task->job}}</td>
                                    <td>{{$task->address}}</td>
                                    <td>{{\Carbon\Carbon::parse($task->day_work)->format('d/m/Y')}}</td>
                                    <td>{{number_format($task->money)}}</td>
                                    <td>
                                        @if($task->pivot->status == 0)
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-danger"></i>
                                                <span class="status">Chưa làm</span>
                                            </span>
                                        @else
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">Đã làm</span>
                                            </span>
                                        @endif
                                    </td>
                                    @if ($task->pivot->status == 0)
                                    <td class="text-right">
                                        <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                  <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{route('task_complete_staff', $task->id)}}">Ấn hoàn thành</a>
                                          </div>
                                        </div>
                                      </td>
                                    @else
                                      <td>Không có hành động</td>
                                    @endif
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Footer -->
                <footer class="footer pt-0">
                  <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                      <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                          <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                          <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                          <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                          <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
@endsection
