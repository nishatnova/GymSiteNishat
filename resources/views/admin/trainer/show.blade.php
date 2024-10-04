@extends('admin.master')

@section('title', 'Show Trainer')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Trainer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Trainer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trainer Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{$trainer->user->name}} Detail Content</h3>
                    <div class="ms-auto">
                        <a href="{{ route('trainer.create') }}" class=" btn btn-primary btn-sm m-1" title="Edit">
                            Create New Instructor
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Trainer User ID</th>
                            <td>{{$trainer->user_id}}</td>
                        </tr>
                        <tr>
                            <th>Trainer Name</th>
                            <td>
                                {{$trainer->user->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Trainer Email</th>
                            <td>
                                {{$trainer->user->email}}
                            </td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>
                                {{$trainer->expertise}}
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                {{$trainer->mobile}}
                            </td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{asset($trainer->image)}}" alt="" height="130" width="150"/>
                            </td>
                        </tr>

                        <tr>
                            <th>Year of Experience</th>
                            <td>
                                {{$trainer->experience}}
                            </td>
                        </tr>
                        <tr>
                            <th>Availability</th>
                            <td>
                                {{$trainer->availability}}
                            </td>
                        </tr>

                        <tr>
                            <th>Detail</th>
                            <td>{!! $trainer->description !!}</td>
                        </tr>

                        <tr>
                            <th>Active Status</th>
                            <td>{{$trainer->active_status == 1 ? "Active" : "Inactive"}}</td>
                        </tr>


                    </table>

                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{ route('trainer.index') }}" class="float-start btn btn-blue btn-sm m-1" title="Back">
                                    <i class="fe fe-arrow-left">Back</i>
                                </a>
                            </div>
                            <div class="float-end d-flex">
                                <a href="{{ route('trainer.edit',$trainer->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                    <i class="fe fe-edit">Edit</i>
                                </a>
                                <form action="{{ route('trainer.destroy',$trainer->id) }}" method="post">
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


