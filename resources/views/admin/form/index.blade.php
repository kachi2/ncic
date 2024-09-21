@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Website</h6>
                                <div>
                                   
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Document</th>
                                                <th>Personal Statement</th>
                                                <th>Resume</th>
                                                 <th>Created At</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                  
                                        @if(count($form) > 0)
                                        @foreach ($form as  $sp)
                                            <tr>
                                            
                                                <td>
                                                    <a href="#">{{$sp->name}}</a>
                                                </td>  
                                                <td>
                                                    <a href="#">{{$sp->email}}</a>
                                                </td>  
                                                <td>
                                                    <a href="{{asset('images/'.$sp->document)}}" download=""> @if($sp->document) Download {{$sp->document}} @else <a href="{{route('admin.form.viewDetails',$sp->email)}}" class="badge bg-info"> View Details</a>  @endif</a>
                                                </td>  
                                                <td>
                                                    @if(isset($sp->personal_statement))    <a href="{{asset('images/'.$sp->personal_statement)}}" download="">  <span class="badge bg-primary"> Download</span>  {{$sp->personal_statement}} </a>@endif
                                                </td>  
                                                <td>
                                                    @if(isset($sp->resume))   <a href="{{asset('images/'.$sp->resume)}}" download="" > <span class="badge bg-primary"> Download</span>  {{$sp->resume}}</a> @endif
                                                </td> 
                                                  <td>
                                                    <a href="#">{{$sp->created_at}}</a>
                                                </td>
                                                {{-- <td class="">
                                                        @if(!isset($sp->document)) <a href="{{route('admin.form.viewDetails',$sp->email)}}" class="badge bg-info"> View Details</a> @else <a href="{{asset('images/'.$sp->document)}}" target="_blank" class="badge bg-success" download=""> Download Form</a> @endif
                                                </td> --}}
                                            </tr>
                                              @endforeach
                                              @else 
                                              <tr>
                                              <td> No data available </td>
                                              </tr>
                                              @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                  </div>

@endsection

@section('script')
<script>




$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 8000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection