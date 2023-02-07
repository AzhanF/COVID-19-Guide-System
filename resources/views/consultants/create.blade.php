@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user-md"></i>  Create Consultant Profile
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Profile</li>
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
                    <form action="{{route('consultant.store')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Add Image:</label>
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/profile.png')}}" onchange="previewFile()">
                                <div id="previewPhoto"></div>
                                <input type="hidden" id="photoHiddenInput" name="photo" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputFirstName" class="control-label">First Name:</label>
                                <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputLastName" class="control-label">Last Name:</label>
                                <input type="text" class="form-control" id="inputLastName" name="lastname" placeholder="Last Name" required>
                            </div>        
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputEmail4" class="control-label">Email:</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="abcd@yahoo.com" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputBirthday" class="control-label">Birth Date:</label>
                                <input type="date" class="form-control" id="inputBirthday" name="birthday" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputNationality" class="control-label">Nationality:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="nationality" class="multiselect multiselect-custom">
                                        <option class="form-control" value="Afghan">Afghan</option>
                                        <option class="form-control" value="Albanian">Albanian</option>
                                        <option class="form-control" value="Algerian">Algerian</option>
                                        <option class="form-control" value="American">American</option>
                                        <option class="form-control" value="Malaysian">Malaysian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputReligion" class="control-label">Religion:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="religion" class="multiselect multiselect-custom">
                                        <option class="form-control" value="Islam">Islam</option>
                                        <option class="form-control" value="Hinduism">Hinduism</option>
                                        <option class="form-control" value="Christianity">Christianity</option>
                                        <option class="form-control" value="Buddhism">Buddhism</option>
                                        <option class="form-control" value="Judaism">Judaism</option>
                                        <option class="form-control" value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Male" required data-parsley-errors-container="#error-radio">
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Female">
                                    <span><i></i>Female</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputPhone" class="control-label">Phone No:</label>
                                <input type="tel" class="form-control" maxlength="11" id="inputPhone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="inputAddress" class="control-label">Address:</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Lot 10, Jalan Batu Caves,..." required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputSpecialization" class="control-label">Specialization:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="specialization" class="multiselect multiselect-custom">
                                    <option class="form-control" value="Certified Peer Specialists">Certified Peer Specialists</option>
                                        <option class="form-control" value="Clinical Social Workers">Clinical Social Workers</option>
                                        <option class="form-control" value="Clinicians">Clinicians</option>
                                        <option class="form-control" value="Counsellors">Counsellors</option>
                                        <option class="form-control" value="Family Nurse Practitioners">Family Nurse Practitioners</option>
                                        <option class="form-control" value="Mental Health Nurse Practitioners">Mental Health Nurse Practitioners</option>
                                        <option class="form-control" value="Pastoral Counselors">Pastoral Counselors</option>
                                        <option class="form-control" value="Psychiatric Pharmacists">Psychiatric Pharmacists</option>
                                        <option class="form-control" value="Psychiatrists">Psychiatrists</option>
                                        <option class="form-control" value="Psychologists">Psychologists</option>
                                        <option class="form-control" value="Social Workers">Social Workers</option>
                                        <option class="form-control" value="Therapists">Therapists</option>   
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputMembership" class="control-label">Professional Affiliation:</label>
                                <input type="text" class="form-control" id="inputMembership" name="membership" placeholder="Professional Affiliation" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="editor">Qualification:</label>
                            @include('components.ckeditor.editor', ['name' => 'qualification'])
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

 