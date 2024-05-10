@extends('layouts.app')

@section('content')


<h1 class="text-center text-primary">Employee Type List</h1>


<div class="col-10 m-auto card">
    <div class="card-body">
        <a href="{{route('students.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="bi bi-plus-circle"></i> Add New Student</a>
        <table class="table table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{asset('uploads/students/'.$student->image)}}" style="width:30px; height:30px;" alt="" title="" /></td>
                    <td>{{$student->name}}</td>
                    <td class="col-3">
                        <form action="{{route('students.destroy', $student->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('students.edit', $student->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <td colspan="6">
                        <span class="text-danger">
                            <strong>No Type Found!</strong>
                        </span>
                </td>
            @endforelse
            </tbody>
          </table>
        {{ $students->links() }}
    </div>
</div>





@endsection
