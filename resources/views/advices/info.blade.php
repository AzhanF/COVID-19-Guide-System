@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fa fa-list-alt"></i>  {{$advice->title}}
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('advice.list')}}">Expert Advices</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$advice->title}}</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            <div class="card single_post">
                <div class="body">
                    <h3><a href="blog-details.html">{{$advice->title}}</a></h3>
                    <div class="img-post">
                        @if($advice->photo)
                            <img class="d-block img-fluid" src="{{$advice->photo}}" style="background-size: cover; width: 100%; height: 100%;" alt="First slide">
                            @else
                            <img class="d-block img-fluid" src="{{asset('imgs/Advice.jpg')}}" alt="First slide">
                        @endif
                    </div>
                    <div class="accordion-body overflow-auto">
                        {!!Purify::clean($advice->advice)!!}
                    </div>
                </div>                        
            </div>
            <div class="card">
                <div class="header">
                    <h2>Other Post or Advices</h2>
                </div>
                <div class="body">
                    <ul class="comment-reply list-unstyled">
                        @foreach($advice2s as $advice2)
                            @if($advice2->consultant_id == $advice->consultant_id)
                            <li class="row clearfix">
                                <div class="icon-box col-md-2 col-4"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">{{$advice2 -> title}}</h5>
                                    <p>{!! substr(Purify::clean($advice2->advice), 0, 180)!!}........</p>
                                    <ul class="list-inline" style="text-align:right">
                                        <li><a href="{{url('advice/view/info/'.$advice2->id)}}" class="btn btn-outline-secondary">Continue Reading</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endif
                        @endforeach
                    </ul>                                        
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            <div class="card">
                <div class="header">
                    <h2 class="text-center">{{$advice->consultant->specialization}}</h2>
                </div>
                <div class="body widget">
                    <div style="text-align:center;">
                        @if (isset($advice->consultant->photo))
                        <img src="{{$advice->consultant->photo}}" style="max-width: 75%; height: auto;"alt="Profile photo">
                        @else
                        <img src="{{asset('imgs/profile.png')}}" style="max-width: 75%; height: auto;" alt="Profile photo">
                        @endif
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align:center;">{{$advice->consultant->firstname}} {{$advice->consultant->lastname}}</h5>
                    <h6 class="card-title" style="text-align:center;">{{$advice->consultant->email}} </h6>
                    <h6 class="card-title" style="text-align:center;">{{$advice->consultant->phone}}</h6>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection
