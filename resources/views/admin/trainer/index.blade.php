@extends('admin.master')
@section('title','Manage Course')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Trainer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Trainer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Trainer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Trainers DataTable</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <th>SL</th>
                            <th>Trainer Name</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($trainers as $trainer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $trainer->user->name }}</td>
                                    <td>{{ $trainer->expertise }}</td>
                                    <td>{{ $trainer->active_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('trainer.edit',$trainer->id) }}" class="btn btn-primary btn-sm m-1" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('trainer.destroy',$trainer->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1" title="Delete" onclick="return confirm('Are you want to delete this !!!')">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('trainer.show', $trainer->id)}}" class="btn btn-info btn-sm m-1">
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

