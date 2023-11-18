@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Course List</div>
    <div class="card-body">
        @can('create-course')
            <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New course</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-course')
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-course')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this course?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No course Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        

        {{ $courses->links() }}

    </div>
</div>
@endsection