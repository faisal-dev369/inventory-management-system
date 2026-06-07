@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 ">

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

        <form method="POST" action="{{ url('/dashboard/income/category/submit') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i> Income Category Registration
                        </div>  
                        <div class="col-md-4 card_button_part text-end">
                            <a href="{{ url('dashboard/income/category') }}" class="btn btn-sm btn-dark">
                                <i class="fas fa-th"></i> All Income Category
                            </a>
                        </div>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">
                            Income Category Name <span class="req_star">*</span>:
                        </label>
                        <div class="col-sm-7">
                            <input type="text" 
                                   class="form-control form_control" 
                                   name="incate_name" 
                                   placeholder="Enter Income Category name" 
                                   required>


                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Remarks:</label>
                        <div class="col-sm-7">
                            <textarea class="form-control form_control" 
                                    
                                      name="incate_remarks" 
                                      placeholder="Optional remarks"></textarea>
                                          
                                     
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark">SUBMIT</button>
                </div>  
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Success message fade-out after 3 seconds
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 3000);
    // Error message fade-out
    setTimeout(function() {
        $('.alert-danger').fadeOut('slow');
    }, 3000);
</script>
@endsection


