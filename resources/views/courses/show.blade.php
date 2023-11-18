@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    course Information
                </div>
                <div class="float-end">
                    <a href="{{ route('courses.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $course->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $course->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>


{{-- <div class="card mt-3">
    <div class="card-header">Student List</div>
    <div class="card-body">
        {{-- @can('create-student')
            <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New student</a>
        @endcan --}}
        {{-- <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Enrolled course</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course->name}}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-student')
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-student')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No student Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table> --}}
         

        {{-- {{ $students->links() }} --}}

    </div>
</div>
    
@endsection