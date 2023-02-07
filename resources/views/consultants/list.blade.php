@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user-md"></i>  Consultant List
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Consultant List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        @foreach ($consultants as $consultant)
        <div class="col-lg-3 col-md-3">
            <div class="card" data-id="{{$consultant->id}}">
                @if($consultant->photo)
                <img class="card-img-top" src="{{$consultant->photo}}" style="width:259.47px; height:259.47px; max-width:100%; max-height:100%" alt="Professional Profile">
                @else
                <img class="card-img-top" src="{{asset('imgs/profile.png')}}" style="width:259.47px; height:259.47px" alt="Professional Profile">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="height:72px">{{$consultant->firstname}} {{$consultant->lastname}}</h5>
                    <p class="card-text" style="height:42px">{{$consultant->specialization}}</p>
                    <div style="text-align:right;">
                    <a href="{{route('consultant.edit', ['id' => $consultant->id])}}" role="button" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a href="{{url('consultant/view/info/'.$consultant->id)}}" role="button" class="btn btn-sm btn-outline-success">
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
                    url: '/consultant/delete/' + delete_id,
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
