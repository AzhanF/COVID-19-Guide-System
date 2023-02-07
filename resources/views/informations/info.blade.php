@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-info-circle"></i>  COVID 19 Info
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('information.list')}}">Information List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Information</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>{{$information->title}}</strong></h2>
                </div>
                <br>
                <div class="body">
                    @if (isset($information->photo))
                        <img src="{{$information->photo}}" class="rounded-3 card-img-top" style="width:50%; ;display: block;margin: auto;" alt="Profile photo">
                    @else
                        <img src="/imgs/no-image-icon.png" class="rounded-3 card-img-top" style="width:25%; ;display: block;margin: auto;" alt="Profile photo">
                    @endif
                    <br>
                    <div class="accordion-body overflow-auto">
                        {!!Purify::clean($information->description)!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection
