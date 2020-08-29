@extends('adminindex')
@section('AllRoleContent')
<div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
              <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                  <i class="mdi mdi-home text-muted hover-cursor"></i>
                  <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Roles&nbsp;/&nbsp;</p>
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
                <p class="card-title">ROLES</p>
                <div class="table-responsive">
                  <table id="recent-purchases-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID Role</th>
                          <th>Role Name</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                        <tr>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>
                            <a class="btn btn-primary btn-info-category" href="">
                                  <i class="mdi mdi-table-edit"></i>
                            </a>
                            <button type="button" class="btn btn-success btn-info-product" data-url="">
                                <i class="mdi mdi-information-outline"></i>
                            </button>
                            <button class="btn btn-danger btn-destroy-product" data-url="">
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
                    {{$roles->links()}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection