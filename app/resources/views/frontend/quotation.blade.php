@extends('layouts.app')
@section('contents')

@if(isset($breadcrums))
<div class="page-header-area" style="background: #ddd url('{{asset('/images/'.$breadcrums->image)}}')  center">
   @else 
   <div class="page-header-area" style="background: #ddd url('{{asset('/images')}}') no-repeat center">
   @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="page-header-title text-center text-md-start">
                    {{-- <h1>Blog Details</h1> --}}
                </div>
            </div>

            <div class="col-md-6 col-lg-8">
                {{-- <nav class="page-header-breadcrumb text-center text-md-end">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="active"><a href="">Blog Details</a></li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</div>

<!-- Start Page Content Wrapper -->
<div class="page-content-wrap pt-90 pt-sm-60 pb-90 pb-sm-60 mb-xl-30">
    <div class="contact-page-area-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="contact-page-form-area mt-90 mt-sm-60">
                        <div class="section-title-wrap mb-36 mb-sm-26">
                            <h2>Request a Service</h2>
                        </div>
                        @if(Session::has('message'))
                        <span class="alert alert-{{Session::get('alert')}}"> {{Session::get('message')}}</span>
                        @endif
                        <div class="contact-form">
                            <form id="contact-fom" action="{{route('request-service')}}" method="post">
                                @csrf
                                <div class="contact-form-content">
                                    <div class="row mb-20">
                                        <div class="col-lg-3">
                                            <div class="form-input-item">
                                                <input type="text" value="{{old('name')}}" name="name" placeholder="Your Name*" required/>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-input-item">
                                                <input type="text" value="{{old('phone')}}" name="phone" placeholder="Your Phone*" required/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="key" value="{{$key}}"> 

                                        <div class="col-lg-3">
                                            <div class="form-input-item">
                                                <input type="email" value="{{old('email')}}" name="email" placeholder="Your Email*"
                                                       required/>
                                            </div>
                                        </div>
                                      
                                            <div class="col-lg-3">
                                                <div class="form-input-item">
                                                    <input type="text" value="{{old('address')}}" name="address" placeholder="Your Address" />
                                                </div>
                                            </div>

                                    </div>
                                    <div class="row mb-20">
                                    <div class="col-lg-3">
                                            <div class="form-input-item">
                                                <input type="text" value="{{old('city')}}" name="city" placeholder="Your City"/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="key" value="{{$key}}"> 

                                        <div class="col-lg-3">
                                            <div class="form-input-item">
                                               
                                                <input type="date" value="{{old('start_date')}}" name="start_date" placeholder="Start date of our service*"
                                                       required/>
                                                       Start date of our service
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-input-item">
                                                
                                                <input type="date" value="{{old('end_date')}}"name="end_date" placeholder="End date of our service *"
                                                       required/>
                                                       End date of our service
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="row mb-20">
                                        <div class="section-title-wrap mb-36 mb-sm-26">
                                            <h6> Kindly select your current need</h6>
                                        </div>
                                       
                                        @foreach ($services as $service )
                                           
                                        <div class="col-lg-2">
                                            <div class="form-input-item" style="text-align:center">
                                              <input type="checkbox"   value="{{$service->name}}" name="services[]" placeholder="" /> {{$service->name}} 
                                            </div>
                                        </div>
                                              
                                              @endforeach
                                  
                                        
                                    </div>

                                    <div class="form-input-item">
                                        <textarea name="message" cols="30" rows="8"
                                                  placeholder="Write your Message*" required>{{old('message')}}</textarea>
                                    </div>

                                    <p> @php echo captcha_img() @endphp </p>
                                    <p><input type="text" placeholder="Enter captcha" name="captcha" required>
                                     </p>

                                    <div class="form-input-item">
                                        <button type="submit" class="btn btn-brand">Send Message</button>
                                    </div>
                                </div>

                                <!-- Show Message Notification -->
                                {{-- @if(Session::has('message'))
                                        <span class="alert alert-{{Session::get('alert')}}"> {{Session::get('message')}}</span>
                                        @endif --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection