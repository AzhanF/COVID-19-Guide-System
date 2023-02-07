@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-dumbbell"></i>  Edit Activity
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('activity.list')}}">Activity Recommended</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Activity</li>
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
                    <form action="{{route('activity.update')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <input type="hidden" name="id" value="{{$activity->id}}">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Video:</label>
                                    <!-- @if($activity->video)
                                    <input type="file" name="video" id="dropify-event" data-default-file= "{{asset('/storage'.$activity->video)}}" onchange="previewFile()">
                                    @else
                                    <input type="file" name="video" id="dropify-event" data-default-file= "{{asset('imgs/exercise.png')}}" onchange="previewFile()">
                                    @endif -->
                                    <input type="file" name="video" id="dropify-event" data-default-file= "{{asset('imgs/exercise.png')}}" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="video" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Activity Name:</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="{{$activity->title}}" value="{{$activity->title}}" >
                        </div>
                        <div class="form-group">
                            <label>Short Description: </label>
                            <input type="text" class="form-control" id="description" name="description" maxlength="80" placeholder="{{$activity->description}}" value="{{$activity->description}}"></input>
                        </div>
                        <div class="form-group">
                            <label for="editor">Step by Step Tutorial:</label>
                            <textarea name="tutorial" class="form-control" id="editor" rows="10" placeholder="Write here..." value="{{$activity->tutorial}}">{{$activity->tutorial}}</textarea>
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
<script>
    function DisallowNestingTables( editor ) {
        editor.model.schema.addChildCheck( ( context, childDefinition ) => {
            if ( childDefinition.name == 'table' && Array.from( context.getNames() ).includes( 'table' ) ) {
                return false;
            }
        } );
    }
    ClassicEditor.create( document.querySelector( '#editor' ), {
        extraPlugins: [ DisallowNestingTables ],
        toolbar: [ 'heading', 'bold', 'italic', '|', 'link', 'insertTable', 'numberedList', 'bulletedList', '|', 'undo', 'redo' ],
        table: {
            toolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        }
    }).catch( error => {
        console.error( error );
    } );
</script>
@include('components.photos.photo-input')
@endsection