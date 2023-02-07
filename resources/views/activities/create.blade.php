@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-dumbbell"></i>  Create New Activity
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Activity</li>
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
                    <form action="{{route('activity.store')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Video:</label>
                                    <input type="file" name="video" id="dropify-event" data-default-file= "{{ asset('imgs/no_video.png') }}" onchange="previewFile()">
                                    <!-- <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="video" value=""> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Activity Name:</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="Activity Name" required >
                        </div>
                        <div class="form-group">
                            <label>Short Description: </label>
                            <input type="text" class="form-control" id="description" name="description" maxlength="80" placeholder="Description About Activity Not More Than 80 Characters" required></input>
                        </div>
                        <div class="form-group">
                            <label for="editor">Step by Step Tutorial:</label>
                            @include('components.ckeditor.editor', ['name' => 'tutorial'])
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