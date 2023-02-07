@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-music"></i>  Add New Song
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Song</li>
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
                    <form action="{{route('music.store')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Cover Image:</label>
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/no-image-icon.png')}}" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="Song Title" required >
                        </div>
                        <div class="form-group">
                            <label for="title">Artist:</label>
                            <input type="text" class="form-control"  id="artist" name="artist" placeholder="Artist" required >
                        </div>
                        <div class="form-group">
                            <label for="inputGenre" class="control-label">Genre:</label>
                            <div class="multiselect_div">
                                <select id="single-selection" name="genre" class="multiselect multiselect-custom">
                                    <option class="form-control" value="Country">Country</option>
                                    <option class="form-control" value="Folk & Acoustic">Jazz</option>
                                    <option class="form-control" value="Indie">Indie</option>
                                    <option class="form-control" value="Instrumental">Instrumental</option>
                                    <option class="form-control" value="Jazz">Jazz</option>
                                    <option class="form-control" value="Pop">Pop</option>
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
                                    <input type="file" name="audio" accept="audio/*" class="custom-file-input" id="inputGroupFile01" onchange="updateFileName()">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
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
    <script>
        function updateFileName() {
            let input = document.querySelector("#inputGroupFile01");
            let fileName = input.value.split("\\").pop();

            document.querySelector(".custom-file-label").innerHTML = fileName;
        }
    </script>
@include('layouts.footer')
</div>
@endsection