@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fa fa-list-alt"></i>  Expert Advices
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expert Advices</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 left-box">
        @foreach($advices as $advice)        
            <div class="card single_post" data-id="{{$advice->id}}">
                <div class="body">
                    <div class="blog-top d-flex clearfix">
                        <div class="short-name">
                        @if($advice->consultant->photo)
                            <img class="rounded-circle" src="{{$advice->consultant->photo}}" width="50" alt="">
                            @else
                            <img src="{{asset('imgs/profile.png')}}" class="rounded" width="50" alt="">
                        @endif
                        </div>
                        <h4 class="name">{{$advice->consultant->firstname}} {{$advice->consultant->lastname}}</h4>
                        <h5 class="time" style="text-align:right">{{$advice->updated_at}}</h5>
                    </div>
                    <h3><a href="blog-details.html">{{$advice->title}}</a></h3>
                    <p>{!! substr(Purify::clean($advice->advice), 0, 180)!!}........</p>
                </div>
                <div class="footer">
                    <div class="actions">
                        <a href="{{url('advice/view/info/'.$advice->id)}}" class="btn btn-outline-secondary">Continue Reading</a>
                    </div>
                    <ul class="stats">
                        <a href="{{route('advice.edit', ['id' => $advice->id])}}" role="button" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteRecord(this)">
                            <i class="fas fa-trash"></i> 
                        </button>
                    </ul>
                </div>
            </div>
        @endforeach
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
                    url: '/advice/delete/' + delete_id,
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
