@extends('layouts.layout')

@section('content')


<h1 class="text-center text-primary">Customer List</h1>


<div class="col-10 m-auto card">
    <div class="card-body">
        <a href="{{route('customers.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="bi bi-plus-circle"></i> Add New Customer</a>
        <table class="table table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td class="col-3">
                        <form action="{{route('customers.destroy', $customer->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>

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
        {{ $customers->links() }}
    </div>
</div>
