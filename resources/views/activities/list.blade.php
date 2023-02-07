@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-dumbbell"></i>  Activity Recommended
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Activity Recommended</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        @foreach ($activities as $activity)
        <div class="col-lg-4 col-md-4">
            <div class="card" data-id="{{$activity->id}}">
                @if($activity->video)
                <video class="myVideo" width="310" height="175" autoplay muted>
                    <source src="{{$activity->video}}" type="video/mp4">
                    <source src="{{$activity->video}}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
                @else
                <img class="card-img-top" src="{{asset('imgs/exercise.png')}}" width="310" height="175" alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$activity->title}}</h5>
                    <p class="card-text">{{$activity->description}}</p>
                    <div style="text-align:right;">
                        <a href="{{route('activity.edit', ['id' => $activity->id])}}" role="button" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="{{url('activity/view/info/'.$activity->id)}}" role="button" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteRecord(this)">
                            <i class="fas fa-trash"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
@include('layouts.footer')
</div>
<script>
    function deleteRecord(element){
        var delete_id = element.closest('.card').dataset.id;
        swal({
            title: "Are you sure?",
            text: "This record cannot be recovered once erased!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) =>{
            if(willDelete){

                var data = {
                    "_token": $('input[name=_token').val(),
                    "id" : delete_id,
                }
                $.ajax({
                    type: "DELETE",
                    url: '/activity/delete/' + delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((result) => {
                            location.reload();
                        });
                    }
                })
            }
        });
    }
</script>
<script>
    var myVideo = document.getElementsByClassName("myVideo");
    for(var i = 0; i < myVideo.length; i++) {
        myVideo[i].onmouseover = function() {
            this.play();
        }
        myVideo[i].onmouseout = function() {
            this.pause();
        }
    }
</script>
@endsection
