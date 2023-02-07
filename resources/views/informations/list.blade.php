@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-info-circle"></i>  COVID 19 Info
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Information List</li>
                    </ol>
                </nav>
                @include('session-messages')
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>National COVID-19 Informations and Standard of Procedure(SOP)</h2>
                </div>
                <div class="body">
                    <div class="table-responsive" style="padding:20px">
                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Title</th>
                                    <th style="text-align:center">Date Published</th>
                                    <th style="text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($informations as $information)
                                <tr>
                                    <input type="hidden" class="serdelete_val-id" value="{{$information->id}}">
                                    <td>{{$information->title}}</td>
                                    <td>{{$information->created_at}}</td>
                                    <td class="actions" style="text-align:center">
                                        <a href="{{route('information.edit', ['id' => $information->id])}}" role="button" class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{url('information/view/info/'.$information->id)}}" role="button" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger servideletebtn">
                                            <i class="fas fa-trash"></i> 
                                        </button>
                                    </td>
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
@include('sweetalert::alert')
</div>
<script>
    $(document).ready(function () {
        
        $('.servideletebtn').click(function (e) {
            e.preventDefault();

            var delete_id = $(this).closest("tr").find(".serdelete_val-id").val();
            swal({
                title: "Are you sure?",
                text: "This record cannot be recovered once erased!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token').val(),
                            "id" : delete_id,
                        }
                        $.ajax({
                            type: "DELETE",
                            url: '/information/delete/' + delete_id,
                            data: data,
                            success: function (response) {
                                swal(response.status , {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    } else {
                        swal("This record is safe!");
                    }
                });
        });
    });
</script>
@endsection
