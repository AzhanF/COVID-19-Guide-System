@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-quran"></i>  Quran
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surah List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($response as $surah)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$surah->name}}</h5>
                    <p class="card-text">{{$surah->name_translations->en}}</p>
                    <a href="quran/{{$surah->number_of_surah}}" class="btn btn-primary">View Surah</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@include('layouts.footer')
</div>
@endsection