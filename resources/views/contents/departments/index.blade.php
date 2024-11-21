@extends('layouts.admin')
 
@section('title','Manage Departments')

@section('content')

<h1 class="mt-4">Manage Departments</h1>
    <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item active">Department details</li>
    </ol>
   
<!-- total departments and add department button-->
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Total Departments</h1>
            <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dep ID</th>
                    <th>Dep Name</th>
                    <th>Designation</th>
                    <th>No. of Employees</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $department->dep_id }}</td>
                        <td>{{ $department->dep_name }}</td>
                        <td>{{ $department->designation }}</td>
                        <td>{{ $department->no_of_employees }}</td>
                        <td>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection