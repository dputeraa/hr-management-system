@extends('layout.app')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('employee/create') }}" class="btn btn-outline-success">
                            <i class="menu-icon fa fa-plus"></i> <strong class="card-title">Add Data</strong>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (Session::has('warning'))
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_add'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success_add') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_update'))
                                <div class="alert alert-success">
                                    {{ session('success_update') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_destroy'))
                                <div class="alert alert-danger">
                                    {{ session('success_destroy') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-bordered table-hover text-left">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Departement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->user->name }}</td>
                                            <td>{{ $employee->user->email }}</td>
                                            <td>{{ $employee->position->name_position }}</td>
                                            <td>{{ $employee->position->departement->name_departement }}</td>
                                            <td>
                                                <a href="{{ url("employee/$employee->id/edit") }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fa fa-edit"></i>&nbsp; Edit
                                                </a>
                                                <a href="{{ url("employee/$employee->id") }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fa fa-eye"></i>&nbsp; Detail
                                                </a>
                                                <a href="{{ url("employee/$employee->id/delete") }}"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                    class="btn btn-outline-danger"> <i class="fa fa-trash"></i>&nbsp;
                                                    Delete</i></a>
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
    </div>
@endsection
