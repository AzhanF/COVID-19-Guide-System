@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fa fa-list-alt"></i>  Create New Advice
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Advice</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-122">
            <div class="card">
                <div class="body">
                    <form action="{{route('advice.store')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Infographic Poster/Material:</label>
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{ asset('/imgs/no-image-icon.png') }}" onchange="previewFile()">
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Title: </label>
                                <input type="text" class="form-control" id="title" name="title" maxlength="80" placeholder="Title" required></input>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputConsultant" class="control-label">Posted By:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="consultant_id" class="multiselect multiselect-custom" placeholder="Consultant Name">
                                        @isset($consultants)  
                                            @foreach($consultants as $consultant)
                                                <option class="form-control" value="{{$consultant->id}}">{{ $consultant->firstname }} {{$consultant->lastname}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="editor">Advice:</label>
                                @include('components.ckeditor.editor', ['name' => 'advice'])
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection