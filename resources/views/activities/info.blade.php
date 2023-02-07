@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-dumbbell"></i>  {{$activity->title}}
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('activity.list')}}">Activity Recommended</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Activity</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>{{$activity->title}}</strong></h2>
                </div>
                <br>
                <div class="body" style="text-align:center; padding:0px;">
                    @if (isset($activity->video))
                    <video class="myVideo" width="520" height="440" controls>
                        <source src="{{$activity->video}}" type="video/mp4">
                        <source src="{{$activity->video}}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    @else
                        <img src="/imgs/no-image-icon.png" class="rounded-3 card-img-top" style="width:25%; ;display: block;margin: auto;" alt="Profile photo">
                    @endif
                    <br>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <tbody>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{$activity->description}}</td>
                                </tr>
                                <tr>
                                    <th>Tutorial:</th>
                                    <td>{!!Purify::clean($activity->tutorial)!!}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection