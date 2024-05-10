@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Update Customer Page</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group col-5 mx-auto mb-5">
            <label for="name" class="mb-1">Enter Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$customer->name}}">
        </div>

        <div class="form-group col-5 mx-auto mb-5">
            <label for="phone" class="mb-1">Enter Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$customer->phone}}">
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>

@endsection
