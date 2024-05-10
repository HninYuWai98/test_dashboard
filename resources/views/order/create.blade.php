@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Add Customer Page</h1>

    <form action={{route('customers.store')}} method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Order</label>
            <div class="col-md-4">
                <select name="customer_id" class="form-select" aria-label="Default select example">
                    <option selected>Customer Name</option>
                    @foreach ($customers as $customer)
                        <option value={{$customer->id}}>{{$customer->name}}</option>
                    @endforeach
                  </select>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>

@endsection
