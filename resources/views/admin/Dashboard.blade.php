@extends('adminindex')
@section('DashboardContent')
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
              <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Thống kê đơn hàng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Thống kê các mục website</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Thống kê lượt truy cập</a>
                  </li>
                </ul>
                <div class="tab-content py-0 px-0">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      {{-- <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Start date</small>
                          <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                              <a class="dropdown-item" href="#">12 Aug 2018</a>
                              <a class="dropdown-item" href="#">22 Sep 2018</a>
                              <a class="dropdown-item" href="#">21 Oct 2018</a>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Tổng tiền các đơn đã đặt</small>
                          <h5 class="mr-2 mb-0">{{number_format($ordertotal)}} Vnđ</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Tổng tiền các đơn đã xử lý</small>
                          <h5 class="mr-2 mb-0">{{number_format($ordertotalprocessed)}} Vnđ</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Tổng tiền các đơn chưa xử lý</small>
                          <h5 class="mr-2 mb-0">{{number_format($ordertotalunprocessed)}} Vnđ</h5>
                        </div>
                      </div>
                      {{-- <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Total views</small>
                          <h5 class="mr-2 mb-0">9833550</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Downloads</small>
                          <h5 class="mr-2 mb-0">2233783</h5>
                        </div>
                      </div>
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Flagged</small>
                          <h5 class="mr-2 mb-0">3497843</h5>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                  <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      {{-- <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Start date</small>
                          <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                              <a class="dropdown-item" href="#">12 Aug 2018</a>
                              <a class="dropdown-item" href="#">22 Sep 2018</a>
                              <a class="dropdown-item" href="#">21 Oct 2018</a>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Downloads</small>
                          <h5 class="mr-2 mb-0">2233783</h5>
                        </div>
                      </div> --}}
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">DANH MỤC</small>
                          <h5 class="mr-2 mb-0">{{$countcategoryadmin}}</h5>
                        </div>
                      </div>
                      {{-- <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Total views</small>
                          <h5 class="mr-2 mb-0">9833550</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Revenue</small>
                          <h5 class="mr-2 mb-0">$577545</h5>
                        </div>
                      </div>
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Flagged</small>
                          <h5 class="mr-2 mb-0">3497843</h5>
                        </div>
                      </div> --}}
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">THƯƠNG HIỆU</small>
                          <h5 class="mr-2 mb-0">{{$countbrandadmin}}</h5>
                        </div>
                      </div>
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">SẢN PHẨM</small>
                          <h5 class="mr-2 mb-0">{{$countproductadmin}}</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                    <div class="d-flex flex-wrap justify-content-xl-between">
                      <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Start date</small>
                          <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                              <a class="dropdown-item" href="#">12 Aug 2018</a>
                              <a class="dropdown-item" href="#">22 Sep 2018</a>
                              <a class="dropdown-item" href="#">21 Oct 2018</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Revenue</small>
                          <h5 class="mr-2 mb-0">$577545</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Total views</small>
                          <h5 class="mr-2 mb-0">9833550</h5>
                        </div>
                      </div>
                      <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Downloads</small>
                          <h5 class="mr-2 mb-0">2233783</h5>
                        </div>
                      </div>
                      <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                        <div class="d-flex flex-column justify-content-around">
                          <small class="mb-1 text-muted">Flagged</small>
                          <h5 class="mr-2 mb-0">3497843</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Cash deposits</p>
                <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                <canvas id="cash-deposits-chart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Total sales</p>
                <h1>$ 28835</h1>
                <h4>Gross sales over the years</h4>
                <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                <div id="total-sales-chart-legend"></div>
              </div>
              <canvas id="total-sales-chart"></canvas>
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Tất Cả Đơn hàng</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Họ tên người đặt</th>
                          <th>Số điện thoại</th>
                          <th >Email</th>
                          <th>Tổng đơn</th>
                          <th>Ngày đặt</th>
                          @hasrole('super_admin|admin')
                          <th>Tình trạng</th>
                          @endhasrole
                      </tr>
                    </thead>
                    <tbody>
                        @if ($countorder == 0)
                          <tr>
                            <td>Không có đơn hàng nào!!!</td>
                          </tr>
                        @else
                          @foreach ($orderdetail as $order)
                            <tr @if($order->order_status == 1) style="background-color:#89e289" @else style="background-color:#f5a6a6"  @endif>
                              <td>{{$order->order_id}}</td>
                              <td>{{$order->order_name}}</td>
                              <td>{{$order->order_phone}}</td>
                              <td>{{$order->order_email}}</td>
                              <td>{{number_format($order->order_total)}}</td>
                              <td>{{$order->created_at}}</td>
                              @hasrole('super_admin|admin')
                              <td>
                                <?php
                                if ($order->order_status == 1) {
                                ?>
                                    <a href="{{route('dashboardunprocessed',$order->order_id)}}" title="Ấn để hoàn tác"><span class='badge badge-danger'>Ấn hoàn tác</span></a>
                                <?php
                                 }else{
                                ?>
                                 <a href="{{route('dashboardprocessed',$order->order_id)}}" title="Ấn để xử lý"><span class='badge badge-success'>Ấn để xử lý</span></a>
                                <?php
                                 }
                                ?>
                              </td>
                              @endhasrole
                            </tr>
                          @endforeach
                        @endif
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

