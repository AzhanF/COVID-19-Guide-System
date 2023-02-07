@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user-md"></i>  View Profile
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('consultant.list')}}">Consultants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-8">
            <div class="card ">
            <div class="header">
                <h2>Experts Profile</h2>
            </div>
            <div class="body">
                <table class="table table-striped m-b-0">
                    <tbody>
                        <tr>
                            <th>First Name:</th>
                            <td>{{$consultant->firstname}}</td>
                            <th>Last Name:</th>
                            <td>{{$consultant->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$consultant->email}}</td>
                            <th>Birth Date:</th>
                            <td>{{$consultant->birthday}}</td>
                        </tr>
                        <tr>
                            <th>Nationality:</th>
                            <td>{{$consultant->nationality}}</td>
                            <th>Religion:</th>
                            <td>{{$consultant->religion}}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{$consultant->gender}}</td>
                            <th>Phone No:</th>
                            <td>{{$consultant->phone}}</td>
                        </tr>
                        <tr>
                            <th>Specialty:</th>
                            <td>{{$consultant->specialization}}</td>
                            <th>Professional Affiliation:</th>
                            <td>{{$consultant->membership}}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{$consultant->address}}</td>
                            <th></th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>                          
            </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2 class="text-center">{{$consultant->specialization}}</h2>
                </div>
                <div class="body">
                    <div style="text-align:center;">
                        @if (isset($consultant->photo))
                        <img src="{{$consultant->photo}}" style="max-width: 75%; height: auto;"alt="Profile photo">
                        @else
                        <img src="{{asset('imgs/profile.png')}}" style="max-width: 75%; height: auto;" alt="Profile photo">
                        @endif
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align:center;">{{$consultant->firstname}} {{$consultant->lastname}}</h5>
                    <h6 class="card-title" style="text-align:center;">{{$consultant->membership}}</h6>
                </div>
            </div>
        </div>         
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Qualification</strong></h2>
                </div>
                <div class="body">
                    {!!Purify::clean($consultant->qualification)!!}
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')
</div>
@endsection
                    