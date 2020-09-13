@extends('adminindex')
@section('AllUserTask')
<div class="content-wrapper">

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
                <p class="card-title">Tất cả nhân viên</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Họ tên</th>
                          <th>Số điện thoại</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user['roles'] as $role)
                                        <span class="badge badge-pill badge-danger"> {{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button onclick="location.href='{{route('view_tasks_of_user',$user->id)}}'" type="button" class="btn btn-outline-primary">View task</button>
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

