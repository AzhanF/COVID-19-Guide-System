@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-music"></i>  Edit Song
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('music.list')}}">Music</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$music->title}}</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <form action="{{route('music.update')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <input type="hidden" name="id" value="{{$music->id}}">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Cover Image:</label>
                                    <!-- @if($music->photo)
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{ $music->photo }}" onchange="previewFile()">
                                    @else
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{ asset('imgs/no_video.png') }}" onchange="previewFile()">
                                    @endif -->
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/no-image-icon.png')}}" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="Song Title" value="{{$music->title}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Artist:</label>
                            <input type="text" class="form-control"  id="artist" name="artist" placeholder="Artist"  value="{{$music->artist}}">
                        </div>
                        <div class="form-group">
                            <label for="inputGenre" class="control-label">Genre:</label>
                            <div class="multiselect_div">
                                <select id="single-selection" name="genre" class="multiselect multiselect-custom">
                                    <option class="form-control" value="Country"{{($music->genre == 'Country')?'selected':null}}>Country</option>
                                    <option class="form-control" value="Folk & Acoustic"{{($music->genre == 'Folk & Acoustic')?'selected':null}}>Folk & Acoustic</option>
                                    <option class="form-control" value="Indie"{{($music->genre == 'Indie')?'selected':null}}>Indie</option>
                                    <option class="form-control" value="Instrumental"{{($music->genre == 'Instrumental')?'selected':null}}>Instrumental</option>
                                    <option class="form-control" value="Jazz"{{($music->genre == 'Jazz')?'selected':null}}>Jazz</option>
                                    <option class="form-control" value="Pop"{{($music->genre == 'Pop')?'selected':null}}>Pop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Song: </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 0.175rem 0.75rem;">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="audio" accept="audio/*" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">{{$music->auu}}</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection