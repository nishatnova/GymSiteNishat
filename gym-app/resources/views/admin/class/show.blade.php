@extends('admin.master')

@section('title', 'Show Class')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Class Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                <li class="breadcrumb-item active" aria-current="page">Class Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Class Detail Content</h3>
                    <div class="ms-auto">
                        <a href="{{ route('gymClass.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Instructor
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Class ID</th>
                            <td>{{$gymClass->id}}</td>
                        </tr>
                        <tr>
                            <th>Class Name</th>
                            <td>
                                {{$gymClass->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Trainer Name</th>
                            <td>
                                {{$gymClass->trainer->user->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Capacity</th>
                            <td>
                                {{$gymClass->capacity}}
                            </td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>
                                {{$gymClass->duration}}
                            </td>
                        </tr>


                        <tr>
                            <th>Class Date</th>
                            <td>
                                {{ \Carbon\Carbon::parse($gymClass->class_time)->format('j F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Class Time</th>
                            <td>
                                {{ \Carbon\Carbon::parse($gymClass->class_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($gymClass->end_time)->format('g:i A') }}
                            </td>
                        </tr>


                        <tr>
                            <th>Active Status</th>
                            <td>{{$gymClass->active_status == 1 ? "Active" : "Inactive"}}</td>
                        </tr>


                    </table>

                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('gymClass.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('gymClass.edit',$gymClass->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('gymClass.destroy',$gymClass->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete" onclick="return confirm('Are you want to delete this !!!')">
                                        <i class="fe fe-trash">Delete</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


