@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user"></i>  Edit My Profile
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.profile.show', ['id' => $admin->id])}}">My Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit My Profile</li>
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
                    <form action="{{route('admin.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$admin->id}}">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Change Image:</label>
                                @if($admin->photo)
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('/storage'.$admin->photo)}}" onchange="previewFile()">
                                @else
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/profile.png')}}" onchange="previewFile()">
                                @endif
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputFirstName" class="control-label">First Name:</label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="First Name" required value="{{$admin->first_name}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputLastName" class="control-label">Last Name:</label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Last Name" required value="{{$admin->last_name}}">
                            </div>        
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputEmail4" class="control-label">Email:</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="abcd@yahoo.com" required value="{{$admin->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputBirthday" class="control-label">Birth Date:</label>
                                <input type="date" class="form-control" id="inputBirthday" name="birthday" required value="{{$admin->birthday}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="inputAddress" class="control-label">Address:</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Lot 10, Jalan Batu Caves,..." required value="{{$admin->address}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Male" required data-parsley-errors-container="#error-radio" {{ $admin->gender == 'Male' ? 'checked' : '' }}>
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Female" {{ $admin->gender == 'Female' ? 'checked' : '' }}>
                                    <span><i></i>Female</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputPhone" class="control-label">Phone No:</label>
                                <input type="tel" class="form-control" id="inputPhone" name="phone" required placeholder="011-2462839" maxlength="11" value="{{$admin->phone}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputNationality" class="control-label">Nationality:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="nationality" class="multiselect multiselect-custom">
                                        <option class="form-control" value="Afghan"{{($admin->nationality == 'Afghan')?'selected':null}}>Afghan</option>
                                        <option class="form-control" value="Albanian"{{($admin->nationality == 'Albanian')?'selected':null}}>Albanian</option>
                                        <option class="form-control" value="Algerian"{{($admin->nationality == 'Algerian')?'selected':null}}>Algerian</option>
                                        <option class="form-control" value="American"{{($admin->nationality == 'American')?'selected':null}}>American</option>
                                        <option class="form-control" value="Malaysian"{{($admin->nationality == 'Malaysian')?'selected':null}}>Malaysian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputReligion" class="control-label">Religion:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="religion" class="multiselect multiselect-custom" placeholder="{{$admin->nationality}}">
                                        <option class="form-control" value="Islam"{{($admin->religion == 'Islam')?'selected':null}}>Islam</option>
                                        <option class="form-control" value="Hinduism"{{($admin->religion == 'Hinduism')?'selected':null}}>Hinduism</option>
                                        <option class="form-control" value="Christianity"{{($admin->religion == 'Christianity')?'selected':null}}>Christianity</option>
                                        <option class="form-control" value="Buddhism"{{($admin->religion == 'Buddhism')?'selected':null}}>Buddhism</option>
                                        <option class="form-control" value="Judaism"{{($admin->religion == 'Judaism')?'selected':null}}>Judaism</option>
                                        <option class="form-control" value="Other"{{($admin->religion == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')    
</div>
@include('components.photos.photo-input')
@endsection

