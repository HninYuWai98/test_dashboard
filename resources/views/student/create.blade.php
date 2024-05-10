@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Add Employee Type Page</h1>

    <form action={{route('students.store')}} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-5 mb-3 mx-auto">
            <label for="name" class="mb-1">Enter Type</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group col-5 mx-auto mb-5">
            <label for="image" class="mb-1">Enter Salary</label>
            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
            @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>

@endsection
