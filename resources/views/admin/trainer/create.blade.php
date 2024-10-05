@extends('admin.master')

@section('title', 'Add Trainer')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Trainer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Trainer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Trainer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Trainer Form</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('trainer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Trainer Name</label>
                            <div class="col-md-9 form-group">
                                <select class="form-control select2-show-search form-select" name="user_id" data-placeholder="Select Trainer" required>
                                    <option label="Select Trainer"></option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}"> {{$user->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('user_id') ? $errors->first('user_id') : ''}}</span>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="expertise" class="col-md-3 form-label">Designation</label>
                            <div class="col-md-9">
                                <input class="form-control" id="expertise" value="{{old('expertise')}}" name="expertise" placeholder="Trainer's Designation" type="text" required/>
                            </div>
                            <span class="text-danger">{{$errors->has('expertise') ? $errors->first('expertise') : ''}}</span>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Phone Number</label>
                            <div class="col-md-9">
                                <input class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}" placeholder="Trainer's Phone number" type="number" required>
                            </div>
                            <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="dropify" id="imgInp" name="image" type="file" data-height="200"/>
                                <img src="" id="categoryImage" alt=""/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="experience" class="col-md-3 form-label">Year of Experience</label>
                            <div class="col-md-9">
                                <input class="form-control" id="experience" value="{{old('experience')}}" name="experience" placeholder="Trainer's Year of Experience" type="number"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="availability" class="col-md-3 form-label">Availability</label>
                            <div class="col-md-9">
                                <input class="form-control" id="availability" value="{{old('availability')}}" name="availability" placeholder="Trainer's Availability" type="text" required/>
                            </div>
                            <span class="text-danger">{{$errors->has('availability') ? $errors->first('availability') : ''}}</span>
                        </div>

                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Trainer Detail</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" name="description" placeholder="Trainer Brief Detail"></textarea>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-md-3 form-label">Active Status</label>
                            <div class="col-md-9 pt-2">
                                <label class="rdiobox"> <input type="radio" class="radio-primary" value="1" checked name="active_status"><span> Active</span> </label>
                                <label class="rdiobox"> <input type="radio" class="radio-primary" value="0" name="active_status"><span> Inactive</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Create New Trainer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
