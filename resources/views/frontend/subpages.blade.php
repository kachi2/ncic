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
<div class="page-content-wrap pt-90 pt-sm-60 pb-90 pb-sm-60 mb-xl-30">
    <div class="service-details-page-wrap">
        <div class="container">
            <div class="row">
            

                <div class="col-lg-9 order-0">
                    <div class="service-details-content">
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

                    </div>

                @if(isset($studentsReg))
              
                <P style="padding-top:10px"> 
                    @if(Session::has('message'))
                    <span class="alert alert-{{Session::get('alert')}} p-2"> {{Session::get('message')}}</span>
                    @endif
                    <br> <br>
                <p style="color:#000"> ENTER INFORMATION BELOW TO CONTINUE REGISTRATION </p>
                <form id="contrm" action="{{route('users.viewForm')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="contact-form-content p-2">
                          <div class="row mb-20">
                              <div class="col-lg-6 p-2">
                                  <div class="form-input-item">
                                      <input type="text" name="name"  value="{{old('name')}}" placeholder="Your Name*" required/>
                                  </div>
                              </div>

                              <div class="col-lg-6 p-2">
                                  <div class="form-input-item">
                                      <input type="email" name="email" value="{{old('email')}}" placeholder="Your Email"/>
                                  </div>
                              </div>
                           
                              <div class="col-lg-6 p-2">
                                <div class="form-input-item">
                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Your Phone"/>
                                </div>
                            </div>
                            </div>
                        </div>
                    <button class="btn btn-primary"> Continue form submission</button>
                </form>
            </P>
                @endif
                </div>

                <div class="col-lg-3  order-lg-0">
                    <aside class="sidebar-wrapper">
                        <!-- Start Single Sidebar -->
                        <div class="sidebar-item">
                          
                            <h3 class="sidebar-title">{{$pages->menu?$pages->Menu->name:$pages->subMenu->Menu->name}}</h3>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    @foreach ($sidebar as $menu )

                                    @if(!empty($sidebars))
                                    <li>  @if($menu->name == 'Home') <a style="color:#211d1d"  href="{{route('index')}}">{{$menu->name}}</a> @else <a style="color:#211d1d" href="{{route('pages', encrypt($menu->id))}}">{{$menu->name}}</a> @endif</li>
                                    
                                    @else 
                                    
                                    <li><a href="{{route('subpages', encrypt($menu->id))}}">{{$menu->name}}</a></li>
                                    @endif
                                    @endforeach
                                </ul> 
                            </div>
                        </div>
                        <a href="{{asset('/assets/Otegee-Company-Profile.pdf')}}" target="_blank" class="btn btn-secondary">Download Company brochure</a>
                           
                    </aside>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection