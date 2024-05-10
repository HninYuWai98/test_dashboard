@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Add Customer Page</h1>

    <form action={{route('customers.store')}} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-5 mb-3 mx-auto">
            <label for="name" class="mb-1">Enter Type</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group col-5 mb-3 mx-auto">
            <label for="phone" class="mb-1">Enter Type</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
            @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>

@endsection
