@extends('layouts.app')

@section('content')
<style>
.carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 450px;
}
.faded-image {
    opacity: 0.4;
}
.carousel-caption {
    position: absolute;
    bottom: 8%;
    left: 15%;
    right: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #000;
    text-align: center;
}
</style>
<div class="container-fluid">
    <div class="row align-items-md-stretch mt-4">
        <div class="col">
            <div class="p-3 text-white bg-dark rounded-3">
                <h3>Welcome to COVID-19 Guide System!</h3>
                <p><i class="bi bi-emoji-heart-eyes"></i> Thanks for your love and support.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="Summary1" class="carousel slide" data-ride="carousel" data-interval="3200">
                <div class="carousel-inner">
                @foreach($informations as $information)
                    @if($information->photo)
                    <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                        <a href="{{url('information/view/info/'.$information->id)}}">
                            <img src="{{$information->photo}}" alt="COVID-19 Information" class="faded-image">
                        </a>
                        <a class="carousel-control-prev" href="#Summary1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#Summary1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <div class="carousel-caption">
                            <h2><strong>{{$information->title}}</strong></h2>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row clearfix">           
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="header">
                    <h2>Team Members</h2>                                
                </div>
                <div class="body">
                    @foreach($consultants as $consultant)
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{$consultant -> photo}}" alt="">
                                    <div class="media-body">
                                        <span class="name">{{$consultant -> firstname}} {{$consultant -> lastname}}</span>
                                        <span class="message">{{$consultant -> specialization}}</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                    
                    </ul>
                    @endforeach
                </div>                    
            </div>                
        </div>
        <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Activity Recommendedation</h2>
                    <h2><small>Keep your body and mentally fit even during isolation</small></h2>
                    <ul class="header-dropdown">
                        <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="fas fa-refresh"></i></a></li>
                        <li><a href="javascript:void(0);" class="full-screen"><i class="fas fa-expand"></i></a></li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-5">
                            <tbody>
                                @foreach($activities as $activity)
                                <tr>
                                    <td>
                                        <p class="margin-0">{{$activity -> title}}</p>
                                    </td>
                                    <td class="text-right">
                                    <a href="{{url('activity/view/info/'.$activity->id)}}" role="button" class="btn btn-sm btn-outline-secondary">
                                        Watch
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
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

