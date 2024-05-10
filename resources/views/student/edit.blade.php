@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Update Student Page</h1>

    <form action="{{ route('students.update', $student->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group col-5 mx-auto mb-5">
            <label for="name" class="mb-1">Enter Salary</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$student->name}}">
        </div>

        <div class="form-group col-5 mb-3 mx-auto">
            <label for="image" class="mb-1">Enter Type</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="image" value="{{$student->image}}">
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>


@endsection
