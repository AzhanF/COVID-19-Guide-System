@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-info-circle"></i>  Create New Information
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Information</li>
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
                    <form action="{{route('information.store')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Photo:</label>
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "/imgs/no-image-icon.png" onchange="previewFile()" >
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="Information Title" required >
                        </div>
                        <div class="form-group">
                            <label for="editor">News or Updates on COVID-19</label>
                            @include('components.ckeditor.editor', ['name' => 'description'])
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



