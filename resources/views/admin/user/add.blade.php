@extends('layouts.admin')

@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                          <!-- success mcg show -->

                           {{-- ✅ Success / Error Message --}}
                           @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
              @endif

             @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></  button>
                  </div>
                 @endif

                          <!-- success mcg show -->

                            <form method="POST" action="{{ url('dashboard/user/submit') }}" enctype="multipart/form-data">
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>User Registration
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{ url('dashboard/user/all') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="user_name">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="user_email">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="username">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="user_pw">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="confirm_pw">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">
                                          <select class="form-control form_control" id="" name="role_id">
                                            <option>Select Role</option>
                                            <option value="1">Superadmin</option>
                                            <option value="2">Admin</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="user_photo">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                 @endsection