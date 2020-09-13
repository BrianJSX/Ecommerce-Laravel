@extends('adminindex')
@section('Task')
<div class="col-12 grid-margin stretch-card mt-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Task</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-4">
              <input name="task_job" type="text" class="form-control" placeholder="công việc" required>
            </div>
            <div class="col-4">
              <input name="task_address" type="text" class="form-control" placeholder="Địa chỉ" required>
            </div>
            <div class="col-4">
              <input name="task_money" type="number" class="form-control" placeholder="Tiền công" required>
            </div>
            <div class="col-4 mt-2">
                <input name="task_day_work" type="date" class="form-control" required>
            </div>
        </div>
        <div class="row mt-4 ml-2">
            <span class="">
                <button type="submit" class="btn btn-outline-success mr-2">Thêm Task</button>
            </span>
        </div>
        </form>
      </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Tasks</p>
          <div class="table-responsive">
            <table id="recent-purchases-listing" class="table">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Công việc</th>
                    <th>Địa chỉ</th>
                    <th>Tiền công</th>
                    <th>Ngày làm</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->job}}</td>
                        <td>{{$task->address}}</td>
                        <td>{{number_format($task->money)}}</td>
                        <td>{{$task->day_work}}</td>
                        <td>
                            <button onclick="location.href='{{route('create_user_task', $task->id)}}'" type="button" class="btn btn-outline-primary">Gắn staff</button>
                            <button type="button" class="btn btn-outline-danger">Xóa</button>
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
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
