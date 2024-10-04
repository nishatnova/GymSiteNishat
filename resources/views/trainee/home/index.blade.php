@extends('website.master')

@section('title', 'Trainee Profile')

@section('body')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center">My Profile</h1>
    </div>
    @if(session('success'))
        <div class="alert alert-success" style="background-color: lightskyblue; color: darkblue; width: 600px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="width: 600px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row mb-30">
            <div class="col-md-12">
                <div class="card p-4">
                    <h4 class="student-heading mb-4">Update Profile</h4>
                    <form action="{{ route('trainee.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-3">
                            <label for="profileImage" class="profile-img">
                                <span id="userIcon" class="{{ $trainee->image ? 'd-none' : '' }}"><i class="fa-solid fa-user"></i></span>
                                <img src="{{ $trainee->image ? asset($trainee->image) : '' }}" alt="Profile Image" id="profileImagePreview" class="{{ $trainee->image ? 'd-block' : 'd-none' }}" style="max-width: 150px; height: auto;"/>
                                <span class="camera-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" class="bi bi-camera" viewBox="0 0 16 16">
                                        <path d="M10.5 2a.5.5 0 0 1 .485.379L11 3h2a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2l.015-.621A.5.5 0 0 1 5.5 2h5zM4.5 3a.5.5 0 0 0-.485.379L4 4H3a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-1l-.015-.621A.5.5 0 0 0 11.5 3h-7z"/>
                                        <path d="M8 5a3 3 0 1 1-2.832 1.999A3 3 0 0 1 8 5zm0 1a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                        <path d="M11 8.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                </span>
                            </label>
                            <input type="file" id="profileImage" class="file-input" name="image" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $trainee->mobile ? $trainee->mobile : '' }}" placeholder="Your Mobile No" />
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option disabled selected>Select Your Gender</option>
                                            <option value="male" {{ $trainee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $trainee->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other"{{ $trainee->gender == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input class="form-control ms-3" id="dob" name="date_of_birth" type="date" value="{{ $trainee->date_of_birth ? $trainee->date_of_birth : '' }}" style="width: 94%;"/>
                                </div>


                            </div>
                        </div>
                        <div class="text-center mt-30 mb-5">
                            <button type="submit" class="btn update-info-btn">Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function(){
                    var output = document.getElementById('profileImagePreview');
                    output.src = reader.result;
                    output.classList.add('d-block');
                    output.classList.remove('d-none');
                    document.getElementById('userIcon').classList.add('d-none');
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

    </div>
@endsection
