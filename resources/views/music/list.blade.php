
@extends('layouts.app')

@section('content')
<style>
    .card-img-left {
        width: 200px;
        height: 200px;
        float: left;
        margin-right: 20px;
    }
    @media (max-width: 600px) {
        .card-img-left {
            width: 40%;
            height: auto;
            margin-right: 10px;
        }
    }
</style>
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-music"></i>  Music List
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Music List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        @foreach($musics as $music)
        <div class="col-lg-12 col-md-12">
            <div class="card overflowhidden" data-id="{{$music->id}}">
                <a href="{{route('music.edit', ['id' => $music->id])}}" >
                    <img class="card-img-left" src="{{$music->photo}}"/>
                </a>
                <div class="card-body">
                    <h4 class="card-title h5 h4-sm">{{$music->title}}</h4>
                    <p class="card-text">Artist: {{$music->artist}}</p>
                    <br><br>
                    <div class="audio-container" data-song-id="{{$music->id}}" style="text-align:right">
                        <audio id="audio">
                            <source src="{{$music->audio}}">
                        </audio>
                        <button style="border-radius: 50px; width: 40px; height: 40px;" class="rewind-btn"><i class="fa fa-fast-backward"></i></button>
                        &nbsp;&nbsp;
                        <button style="border-radius: 50px; width: 40px; height: 40px;" class="play-pause-btn"><i class="fa fa-play"></i></button>
                        &nbsp;&nbsp;
                        <button style="border-radius: 50px; width: 40px; height: 40px;" class="fastforward-btn"><i class="fa fa-fast-forward"></i></button>
                        &nbsp;&nbsp;
                        <button style="border-radius: 50px; width: 40px; height: 40px;" class="stop-btn"><i class="fa fa-stop" ></i></button>
                        &nbsp;&nbsp;
                        <button type="button" style="border-radius: 50px; width: 40px; height: 40px;" class="btn btn-outline-danger" onclick="deleteRecord(this)">
                            <i class="fas fa-trash"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@include('layouts.footer')
</div>
@include('components.audio.audio-list')
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
                    url: '/music/delete/' + delete_id,
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
@endsection
