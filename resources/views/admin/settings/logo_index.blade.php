@extends('admin.layouts.admin')
@section('content')
        <div class="container-fluid h-100">
            <div class="row app-block">
                <div class="col-md-3 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.logoCreate')}}" class="badge badge-info p-2"  style="color:#fff">
                                Add Client Logo
                            </a>
                        </div>
                        <div class="app-sidebar-menu">
                            @include('admin.settings.sidebar')
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        @forelse ($logos as $ss )
                        <div class="card-body">
                            <a  href="{{route('admin.logoDelete', encrypt($ss->id))}}" onclick="return confirm('Are you sure, you want to delete this slider')" class="badge badge-danger"> Delete Logo</a>
                            <div class="slider-for">
        
                                <div class="">
                                    <img src="{{asset('images/'.$ss->image)}}"  style=""
                                         alt="image">
                                </div>
                                
                            </div>
                        </div>
                        @empty
                                    
                        @endforelse
                    </div>
                </div>
                
            </div>

        </div>
@endsection
@section('script')
<script>
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});

$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    centerMode: true,
    focusOnSelect: true
});
</script>
@endsection