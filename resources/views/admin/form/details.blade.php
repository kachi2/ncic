@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Student Application Form</h6>
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
                                

                                    <div class="row" style="width:900px; margin:0px auto" >
                                        <div class="col-lg-9 order-0" style="margin:0px auto; width:700px; border:1px solid #8686867e; padding:30px">
                        
                                            <p style="text-align:center">
                                            <img src="{{asset('/assets/Picture.png')}}" alt="" style="width: 300px"> 
                                              
                                            </p>
                                            <p  style="text-align:center; font-size:22px; text-decoration:underline">
                                                <a href="" style="color:#000">EXHIBIT A</a>
                                            </p>
                                            <p style="text-align:center;color:#000; font-size:18px; font-family:'Times New Roman', Times, serif">
                                                STUDENT CONSENT FOR RELEASE OF INFORMATION
                                            </p>
                                        
                                            <div style=" padding-top:10px; text-align:left;color:#000; font-size:18px; font-family:'Times New Roman', Times, serif">
                        
                                         
                                            <p>
                                                I understand that if I am admitted and enroll at The University of Memphis, the federal
                                            </p>
                                            <p >
                                               <span style="font-style: italic">Family Educational Rights and Privacy Act of 1972</span>  (FERPA) protects the privacy of my
                                               education records. As a prospective student, I also may have rights under the laws of the 
                        United States, the State of Tennessee and/or my country of residence protecting the privacy of records I give to  <span style="font-style: italic"> UNIVERSITY </span>  and/or third parties in connection with my 
                        application to enroll as a  <span style="font-style: italic"> UNIVERSITY </span> student.
                                            </p>
                                            <p>
                                                By signing this form, I, <input style="border:none; border-bottom:1px solid #000; width:350px; padding-left:10px" value="{{strtoupper($form->name)}}">  , hereby  <span style="font-weight: bold"> waive</span>  
                                                    any rights described above and <span style="font-weight: bold"> give my consent </span> to  <span style="font-style: italic">  UNIVERSITY </span> and the person / 
                                                    PARTNER named below to disclose my application and any other education records to 
                                                    each other for the purpose of discussing my application to, admission status and 
                                                    educational experience at  <span style="font-style: italic">  UNIVERSITY </span>
                                            </p>
                                            <p>
                                                <div class="row">
                                                    <div class="col-md-4 col-6">
                                                        Name of Person: <br>
                                                        Name of PARTNER:<br>
                                                        Address:<br>
                                                        Phone Number:<br>
                                                        Email Address:<br>
                                                    </div>
                                                    <div class="col-md-8 col-6" style="float: left; overflow:scroll"> 
                                                        <input style="border:none; border-bottom:1px solid #000; width:420px" value="RACHEAL AKANBI" readonly>  <br>
                                                        <input style="border:none; border-bottom:1px solid #000; width:420px" value="OTEGEE CONCEPTS" readonly>  <br>
                                                        <input style="border:none; border-bottom:1px solid #000; width:420px" value="4, ADO IBRAHIM STREET, YABA, LAGOS, NIGERIA" readonly>  <br>
                                                        <input style="border:none; border-bottom:1px solid #000; width:420px" value="+234-705-827-4708" readonly>  <br>
                                                        <input style="border:none; border-bottom:1px solid #000; width:420px" value="INFO@OTEGEECONCEPTS.COM.NG" readonly>  <br>
                                                    </div>
                        
                                                </div>
                        
                        
                                            </p>
                                            <p style="padding-top:10px">
                                                I understand that I have the right  <span style="font-weight: bold"> not </span> to consent to the release of information in my 
                                                student records and that <span style="font-weight: bold"> I </span> may revoke this consent at any time by giving written notice to 
                                                <span style="font-style: italic">  UNIVERSITY </span> and the person / <span style="font-style: italic">  PARTNER </span> named above. This consent remains valid 
                                                unless and until I revoke it.
                                            </p>
                        
                                            <p style="padding-top:10px">
                                                Prospective Student Signature: <img src="{{asset('images/'.$form->student_signature)}}" style="width: 50px"> <br>
                                                Prospective Student Name (print):<input style="border:none; border-bottom:1px solid #000; width:350px;  padding-left:10px" value="{{strtoupper($form->name)}}"><br>
                                                Date:<input style="border:none; border-bottom:1px solid #000; width:350px" name="date_signed" placeholder="dd-mm-yy"  value="{{$form->date_signed}}"><br>
                                            </p>
                                            <p style="padding-top:10px">
                                                <span style="font-weight: bold">  If Prospective Student is under 18 years of age: </span>
                                            </p>
                        
                                            <p style="padding-top:10px">
                                                I am the parent or legal guardian of the Prospective Student. I am signing this document 
                                                on his or her behalf.
                                            </p>
                        
                                            <p style="padding-top:10px">
                                                Parent or Guardian Signature: <img src="{{asset('images/'.$form->parent_signature)}}" style="width: 50px"> <br>
                                                Parent or Guardian Name (print):<input style="border:none; border-bottom:1px solid #000; width:350px" name="parent_name" value="{{$form->parent_name}}"><br>
                                                Date:<input style="border:none; border-bottom:1px solid #000; width:350px" value="{{$form->date_signed}}"><br>
                                            </p>
                                        </div>
                                            
                                            {{-- <div class="service-details-content">
                                                <h2>{{$pages->title}}</h2>
                                                <hr>
                                                    <div class="project-details-thumb ht-slick-slider" data-slick='{"arrows": false, "dots": true}'>
                                                      
                                                        <figure class="project-thumb-item">
                                                            <img src="{{asset('images/'.$pages->metas)}}" alt="Project"/>
                                                        </figure>
                                                    </div>
                                                    <div class="service-details-info">
                                                    
                                                    <p>{!! $pages->contents !!}</p>
                        
                                                    
                                                </div>
                        
                                            </div> --}}

                        
                                            <p style="padding:20px 0px">
                        
                                                <button class="btn btn-primary w-50"> Download Form</button>
                                            </p>
                                        </div>
                                        
                                        
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