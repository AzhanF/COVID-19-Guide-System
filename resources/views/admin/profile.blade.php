@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user"></i>  My Profile
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-4 col-md-3">
            <div class="card bg-light">
                <div class="px-5 pt-2">
                    @if (isset($admin->photo))
                    <img src="{{asset('/storage'.$admin->photo)}}" class="rounded-3 card-img-top" alt="Profile photo">
                    @else
                    <img src="{{asset('imgs/profile.png')}}" class="rounded-3 card-img-top" alt="Profile photo">
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{$admin->first_name}} {{$admin->last_name}}</h5>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gender: {{$admin->gender}}</li>
                        <li class="list-group-item">Phone: {{$admin->phone}}</li>
                    </ul>
                </div>            
            </div>
                <div class="col-sm-8 col-md-9">
                    <div class="p-3 mb-3 border rounded bg-white">
                        <div class="header">
                            <h2>Profile Information</h2>
                        </div>
                        <table class="table table-striped m-b-0">
                            <tbody>
                                <tr>
                                    <th scope="row">First Name:</th>
                                    <td>{{$admin->first_name}}</td>
                                    <th>Last Name:</th>
                                    <td>{{$admin->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td>{{$admin->email}}</td>
                                    <th>Birthday:</th>
                                    <td>{{$admin->birthday}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nationality:</th>
                                    <td>{{$admin->nationality}}</td>
                                    <th>Religion:</th>
                                    <td>{{$admin->religion}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender:</th>
                                    <td>{{$admin->gender}}</td>
                                    <th>Phone No:</th>
                                    <td>{{$admin->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address:</th>
                                    <td>{{$admin->address}}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-group"  role="group">
                        <a href="{{route('admin.edit', ['id' => $admin->id])}}" role="button"  class="btn btn-sm btn-outline-primary" style="left:686px"><i class="fas fa-pen-alt"></i> Edit</a>
                    </div>
                </div>
        </div>          
    </div>
@include('layouts.footer')
</div>
@endsection
                    