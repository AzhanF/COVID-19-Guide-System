<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>COVID-19 Guide</title>

    <link rel="shortcut icon" href="{{asset('favicon_io/favicon.ico')}}">
    <link rel="shortcut icon" sizes="16x16" href="{{asset('favicon_io/favicon-16x16.png')}}">
    <link rel="shortcut icon" sizes="32x32" href="{{asset('favicon_io/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" href="{{asset('favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('favicon_io/android-chrome-192x192.png')}}" sizes="192x192">
    <link rel="icon" href="{{asset('favicon_io/android-chrome-512x512.png')}}" sizes="512x512">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/animate-css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/dropify/css/dropify.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color_skins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css')}}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet"></link>
   
</head>
<body>
<!-- Overlay For Sidebars -->
@include('sweetalert::alert')
<div class="overlay" style="display: none;"></div>
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <a href="{{ url('/') }}">
                        <span class="name">COVID-19 Guide</span>
                    </a>
                </div>
                <div class="navbar-right">
                    <ul class="list-unstyled clearfix mb-0">
                        <li>
                            <div class="navbar-btn btn-toggle-show">
                                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                            </div>                        
                            <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                        </li>
                        <li>
                            <div id="navbar-menu">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <span class="badge bg-light text-dark">{{ ucfirst(Auth::user()->role) }}</span>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                            @if(Auth::user()->photo)
                                            <img class="rounded-circle" src="{{asset('/storage'.Auth::user()->photo)}}" width="30" alt="">
                                            @else
                                            <img class="rounded-circle" src="{{asset('imgs/profile.png')}}" width="30" alt="">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu animated flipInY user-profile">
                                            <div class="d-flex p-3 align-items-center" style="background-color: #F5CCF8">
                                                <div class="drop-left m-r-10">
                                                    @if(Auth::user()->photo)
                                                    <img class="rounded-circle" src="{{asset('/storage'.Auth::user()->photo)}}" width="50" alt="">
                                                    @else
                                                    <img src="{{asset('imgs/profile.png')}}" class="rounded" width="50" alt="">
                                                    @endif
                                                </div>
                                                <div class="drop-right">
                                                    <h4 style="color:grey">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                                                    <p class="user-name">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <div class="m-t-10 p-3 drop-list">
                                                <ul class="list-unstyled">
                                                    <li><a href="{{url('admin/view/profile/'.Auth::user()->id)}}"><i class="fas fa-user"></i>My Profile</a></li>
                                                    <li><a href="{{url('/admin/password/edit/'.Auth::user()->id)}}"><i class="fas fa-lock"></i>Change Password</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="leftsidebar" class="sidebar">
            <div class="sidebar-scroll">
                <nav id="leftsidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu"  style="display: inline-block">
                        <li class="heading">Main</li>
                            <li class="middle {{ request()->is('home')? 'active' : '' }}">
                                <a href="{{url('home')}}">
                                    <i class="fa fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        <li class="heading">App</li>
                            <li class="middle {{ request()->is('information*')? 'active' : '' }}">
                                <a href="#information-submenu">
                                    <i class="fas fa-info-circle"></i>
                                    <span>COVID-19 Info</span>
                                </a>
                                <ul>
                                    <li class="nav-item w-100" {{ request()->routeIs('information.list')? 'style="font-weight:bold;"' : '' }}><a href="{{route('information.list')}}">View Information</a></li>
                                    <li class="nav-item w-100" {{ request()->routeIs('information.create')? 'style="font-weight:bold;"' : '' }}><a href="{{route('information.create')}}">Create Information</a></li>
                                </ul>
                            </li>
                            <li class="middle {{ request()->is('advice*')? 'active' : '' }}">
                                <a href="#advice-submenu" class="">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Expert Advice</span>
                                </a>
                                <ul>
                                <li class="nav-item w-100" {{ request()->routeIs('advice.list')? 'style="font-weight:bold;"' : '' }}><a href="{{route('advice.list')}}">View Advice</a></li>
                                    <li class="nav-item w-100" {{ request()->routeIs('advice.create')? 'style="font-weight:bold;"' : '' }}><a href="{{route('advice.create')}}">Create Advice</a></li>
                                </ul>
                            </li>
                            <li class="middle {{ request()->is('consultant*')? 'active' : '' }}">
                                <a href="#consualtant-submenu" class="">
                                    <i class="fas fa-user-md"></i>
                                    <span>Consultants</span>
                                </a>
                                <ul>
                                    <li class="nav-item w-100" {{ request()->routeIs('consultant.list')? 'style="font-weight:bold;"' : '' }}><a href="{{route('consultant.list')}}">View Consultants</a></li>
                                    <li class="nav-item w-100" {{ request()->routeIs('consultant.create')? 'style="font-weight:bold;"' : '' }}><a href="{{route('consultant.create')}}">Create Consultant</a></li>
                                </ul>
                            </li>
                            <li class="middle {{ request()->is('activity*')? 'active' : '' }}">
                                <a href="#activity-submenu">
                                    <i class="fas fa-dumbbell"></i>
                                    <span>Activity Recommended</span>
                                </a>
                                <ul>
                                    <li class="nav-item w-100" {{ request()->routeIs('activity.list')? 'style="font-weight:bold;"' : '' }}><a href="{{route('activity.list')}}">View Activities</a> </li>
                                    <li class="nav-item w-100" {{ request()->routeIs('activity.create')? 'style="font-weight:bold;"' : '' }}><a href="{{route('activity.create')}}">Create Activity</a> </li>
                                </ul>
                            </li> 
                            <li class="middle {{ request()->is('quran*')? 'active' : '' }}">
                                <a href="{{route('quran')}}">
                                    <i class="fas fa-quran"></i>
                                    <span>Quran</span>
                                </a>
                            </li> 
                            <li class="middle {{ request()->is('music*')? 'active' : '' }}">
                                <a href="#activity-submenu">
                                    <i class="fas fa-music"></i>
                                    <span>Music Playlist</span>
                                </a>
                                <ul>
                                    <li class="nav-item w-100" {{ request()->routeIs('music.list')? 'style="font-weight:bold;"' : '' }}><a href="{{route('music.list')}}">View Songs</a> </li>
                                    <li class="nav-item w-100" {{ request()->routeIs('music.create')? 'style="font-weight:bold;"' : '' }}><a href="{{route('music.create')}}">Add New Song</a> </li>
                                </ul>
                            </li>    
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div id="main-content">
        @yield('content')
    </div>
</div>
</body>
</html>
