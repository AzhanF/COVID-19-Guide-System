@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-quran"></i>  {{$response->name_translations->ar}}
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('quran')}}">Surah List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$response->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>{{$response->name}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <tbody>
                                <tr>
                                    <th>Translation:</th>
                                    <td>{{$response->name_translations->en}}</td>
                                    <th>Place:</th>
                                    <td>{{$response->place}}</td>
                                </tr>
                                <tr>
                                    <th>Total of Ayah:</th>
                                    <td>{{$response->number_of_ayah}}</td>
                                    <th>Number of Surah:</th>
                                    <td>{{$response->number_of_surah}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Play Audio:</th>
                                    <td>{{$response->recitations[0]->name}} <br> <br>
                                        <audio src="{{$response->recitations[0]->audio_url}}" controls></audio>
                                    </td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="body">                          
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                @foreach($response->verses as $ayat)
                                <tr>
                                    <td style="text-align: right"><h3>{{$ayat->text}}</h3></td>
                                </tr>
                                <tr >
                                    <td><h6>{{$ayat->translation_en}}</h6></td>
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