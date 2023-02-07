@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-info-circle"></i>  Edit COVID 19 Info
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('information.list')}}">Information List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Information</li>
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
                    <form action="{{route('information.update')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                        <input type="hidden" name="id" value="{{$information->id}}">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Change Image:</label>
                                    @if($information->photo)
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{$information->photo}}" onchange="previewImage()">
                                    @else
                                    <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/no-image-icon.png')}}" onchange="previewFile()">
                                    @endif
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control"  id="title" name="title" placeholder="Information Title" value="{{$information->title}}">
                        </div>
                        <div class="form-group">
                            <label for="editor">Update Information:</label>
                            <textarea name="description" class="form-control" id="editor" rows="10" placeholder="Write here..." value="{{$information->description}}">{{$information->description}}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
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
<script>
    function previewImage() {
    var preview = document.querySelector('#previewPhoto');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.innerHTML = "<img src='" + reader.result + "' style='width:100%' />";
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
    }
</script>
@include('components.photos.photo-input')
@endsection
