@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col ps-4">
                <h1 class="display-6 mb-3">
                    <i  class="fas fa-user-md"></i>  Edit Consultant Profile
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('consultant.list')}}">Consultants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                    <form action="{{route('consultant.update')}}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <input type="hidden" name="id" value="{{$consultant->id}}">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Add Image:</label>
                                <!-- @if($consultant->photo)
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('/storage'.$consultant->photo)}}" onchange="previewFile()">
                                @else
                                <input type="file" name="photo" id="dropify-event" data-default-file= "{{asset('imgs/profile.png')}}" onchange="previewFile()">
                                @endif -->
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
                                <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="First Name" required value="{{$consultant->firstname}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputLastName" class="control-label">Last Name:</label>
                                <input type="text" class="form-control" id="inputLastName" name="lastname" placeholder="Last Name" required value="{{$consultant->lastname}}">
                            </div>        
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputEmail4" class="control-label">Email:</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="abcd@yahoo.com" required value="{{$consultant->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputBirthday" class="control-label">Birth Date:</label>
                                <input type="date" class="form-control" id="inputBirthday" name="birthday" required value="{{$consultant->birthday}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputNationality" class="control-label">Nationality:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="nationality" class="multiselect multiselect-custom" placeholder="{{$consultant->nationality}}">
                                        <option class="form-control" value="Afghan"{{($consultant->nationality == 'Afghan')?'selected':null}}>Afghan</option>
                                        <option class="form-control" value="Albanian"{{($consultant->nationality == 'Albanian')?'selected':null}}>Albanian</option>
                                        <option class="form-control" value="Algerian"{{($consultant->nationality == 'Algerian')?'selected':null}}>Algerian</option>
                                        <option class="form-control" value="American"{{($consultant->nationality == 'American')?'selected':null}}>American</option>
                                        <option class="form-control" value="Malaysian"{{($consultant->nationality == 'Malaysian')?'selected':null}}>Malaysian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputReligion" class="control-label">Religion:</label>
                                <div class="multiselect_div">
                                    <select id="single-selection" name="religion" class="multiselect multiselect-custom">
                                        <option class="form-control" value="Islam"{{($consultant->religion == 'Islam')?'selected':null}}>Islam</option>
                                        <option class="form-control" value="Hinduism"{{($consultant->religion == 'Hinduism')?'selected':null}}>Hinduism</option>
                                        <option class="form-control" value="Christianity"{{($consultant->religion == 'Christianity')?'selected':null}}>Christianity</option>
                                        <option class="form-control" value="Buddhism"{{($consultant->religion == 'Buddhism')?'selected':null}}>Buddhism</option>
                                        <option class="form-control" value="Judaism"{{($consultant->religion == 'Judaism')?'selected':null}}>Judaism</option>
                                        <option class="form-control" value="Other"{{($consultant->religion == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <br>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Male" required data-parsley-errors-container="#error-radio" {{ $consultant->gender == 'Male' ? 'checked' : '' }}>
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="gender" value="Female" {{ $consultant->gender == 'Female' ? 'checked' : '' }}>
                                    <span><i></i>Female</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="inputPhone" class="control-label">Phone No:</label>
                                <input type="tel" class="form-control" id="inputPhone" name="phone" required maxlength="11" value="{{$consultant->phone}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="inputAddress" class="control-label">Address:</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Lot 10, Jalan Batu Caves,..." required value="{{$consultant->address}}">
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
                                <input type="text" class="form-control" id="inputMembership" name="membership" placeholder="Professional Affiliation" required value="{{$consultant->membership}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="editor">Qualification:</label>
                            <textarea name="qualification" class="form-control" id="editor" placeholder="Write here..." value="{{$consultant->qualification}}">{{$consultant->qualification}}</textarea>
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
@endsection

 