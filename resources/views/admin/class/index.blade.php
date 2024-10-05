@extends('admin.master')
@section('title','Manage Class')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Class Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Class</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Classes DataTable</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <th>SL</th>
                            <th>Class Name</th>
                            <th>Trainer Name</th>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($gymClasses as $gymClass)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gymClass->name }}</td>
                                    <td>{{ $gymClass->trainer->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($gymClass->class_time)->format('j M Y') }} ({{ \Carbon\Carbon::parse($gymClass->class_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($gymClass->end_time)->format('g:i A') }})</td>
                                    <td>{{ $gymClass->active_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('gymClass.edit',$gymClass->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('gymClass.destroy',$gymClass->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('gymClass.show', $gymClass->id)}}" class="btn btn-info btn-sm m-1">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

