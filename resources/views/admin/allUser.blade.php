@extends('adminindex')
@section('UserContent')
<div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
              <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                  <i class="mdi mdi-home text-muted hover-cursor"></i>
                  <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;User&nbsp;/&nbsp;</p>
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
          <div class="col-md-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Quản Lý Người Dùng</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID User</th>
                          <th>Họ tên</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Roles</th>
                          <th>Permissions</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td>
                          {{$user->id}}
                        </td>
                        <td>
                          {{$user->name}}
                        </td>
                        <td>
                          {{$user->email}}
                        </td>
                        <td>
                          {{$user->phone}}
                        </td>
                        <td>
                          @foreach($user->roles as $role)
                            <span class="badge badge-pill badge-primary">{{ $role->name}}</span>
                          @endforeach
                        </td>
                        <td>
                          @foreach ($user->getPermissionsViaRoles()->unique('id') as $permission)
                            <span class="badge badge-pill badge-primary">{{$permission->name}}</span>
                          @endforeach
                        </td>
                        <td>
                            <a class="btn btn-primary btn-info-category" href="{{route('edituser', $user->id)}}">
                                  <i class="mdi mdi-table-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-destroy-user" data-url="{{route('destroyuser',$user->id)}}">
                                <i class="mdi mdi-delete-forever"></i>
                            </button>
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
                    {{ $users->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
