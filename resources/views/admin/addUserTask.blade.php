@extends('adminindex')
@section('AddUserTask')
<div class="col-12 grid-margin stretch-card mt-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Task</h4>
      <div>
      </div>
        <div class="row">
            <div class="col-3">
                <input value="{{$tasks->id}}" name="task_id" type="text" class="form-control" placeholder="id" disabled>
            </div>
            <div class="col-3">
                <input value="{{$tasks->job}}" name="task_job" type="text" class="form-control" placeholder="công việc" disabled>
            </div>
            <div class="col-3">
              <input value="{{$tasks->address}}" name="task_address" type="text" class="form-control" placeholder="Địa chỉ" disabled>
            </div>
            <div class="col-3">
              <input value="{{$tasks->money}}" name="task_money" type="number" class="form-control" placeholder="Tiền công" disabled>
            </div>
            <div class="col-3 mt-2">
                <input value="{{$tasks->day_work}}" name="task_day_work" type="text" class="form-control" disabled>
            </div>
        </div>
      </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card mt-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Task Cho User</h4>
      <div>
        @include('errors.note')
      </div>
      <form class="forms-sample" action="" method="post">
        {{csrf_field()}}
        @foreach ($users as $user)
            <div class="form-check form-check-inline">
                <input
                @foreach ($user_task as $user_tasks)
                    @if($user_tasks->id == $user->id)
                    checked
                    @endif
                @endforeach
                name="user_task[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$user->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$user->name}}</label>
            </div>
        @endforeach
          <div class="row">
              <span class="m-1">
                    <button type="submit" class="btn btn-primary mr-2">Thêm</button>
              </span>
              <span class="m-1">
                    <a href="{{route('create_task')}}"class="btn btn-danger mr-2">Hủy</a>
              </span>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
