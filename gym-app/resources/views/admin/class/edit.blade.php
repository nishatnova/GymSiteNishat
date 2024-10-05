@extends('admin.master')

@section('title', 'Edit Class')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Class Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Class</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Class Form</h3>
                </div>
                <div class="card-body">

                    <h4 class="text-primary">{{session('message')}}</h4>
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" action="{{ route('gymClass.update',$gymClass->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Class Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="{{$gymClass->name}}" name="name" placeholder="Class Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Trainer Name</label>
                            <div class="col-md-9 form-group">
                                <select class="form-control select2-show-search form-select" name="trainer_id" data-placeholder="Select Trainer" required>
                                    <option label="Select Trainer"></option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{$trainer->id}}" {{$gymClass->trainer_id == $trainer->id ? 'selected' : ''}} >{{$trainer->user->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('trainer_id') ? $errors->first('trainer_id') : ''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="capacity" class="col-md-3 form-label">Capacity</label>
                            <div class="col-md-9">
                                <input class="form-control" id="capacity" value="{{$gymClass->capacity}}" name="capacity" placeholder="Class Member Capacity" type="number" required/>
                            </div>
                            <span class="text-danger">{{$errors->has('capacity') ? $errors->first('capacity') : ''}}</span>
                        </div>

                        <div class="row mb-4">
                            <label for="class_time" class="col-md-3 form-label">Class Time</label>
                            <div class="col-md-9">
                                <input class="form-control" id="class_time" value="{{$gymClass->class_time}}" name="class_time" placeholder="Class Duration in Minutes" type="datetime-local" required/>
                            </div>
                            <span class="text-danger">{{$errors->has('class_time') ? $errors->first('class_time') : ''}}</span>
                        </div>

                        <div class="row mb-6">
                            <label class="col-md-3 form-label">Active Status</label>
                            <div class="col-md-9 pt-2">
                                <label class="rdiobox"> <input type="radio" class="radio-primary" value="1" {{$gymClass->active_status == 1 ? 'checked' : ''}} name="active_status"><span> Active</span> </label>
                                <label class="rdiobox"> <input type="radio" class="radio-primary" value="0" {{$gymClass->active_status == 0 ? 'checked' : ''}} name="active_status"><span> Inactive</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Create New Class</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
