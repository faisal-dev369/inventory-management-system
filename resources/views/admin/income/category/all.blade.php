@extends('layouts.admin')

@section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>All Income Category Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="{{ url('dashboard/income/category/add') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income Category </a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">


                                {{-- Success / Error Message --}}
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
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif



                                <table class="table table-bordered table-striped table-hover custom_table">
                                  <thead class="table-dark">
                                    <tr>

                                      <th>Income Category</th>
                                      <th>Remarks</th>
                                  
                                      <th>Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($allData as $data)
                                    <tr>
                                      <td>{{$data->incate_name}}</td>
                                      <td>{{$data->incate_remarks}}</td>
                                      <td>
                                          <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{url('/dashboard/income/category/view/'.$data->incate_slug)}}">View</a></li>
                                              <li><a class="dropdown-item" href="{{url('/dashboard/income/category/edit/'.$data->incate_slug)}}">Edit</a></li>
                                              <!-- <li><a class="dropdown-item" href="#">Delete</a></li> -->
                                              <a href="/dashboard/income/category/softdelete/{{ $data->incate_id }}" class="btn btn-warning btn-sm">Soft Delete</a>
                                             <!-- <a href="/dashboard/income/category/restore/{{ $data->incate_id }}" class="btn btn-info btn-sm" >Restore</a> -->
                                             <a href="/dashboard/income/category/delete/{{ $data->incate_id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hard Delete</a>


                                            </ul>
                                          </div>
                                      </td>
                                    </tr>
                                    @endforeach
                                    
                                  
                                  </tbody>
                                </table>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>
               @endsection


 @section('scripts')
<script>
    // Success message fade-out after 3 seconds
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 3000);
</script>
@endsection
