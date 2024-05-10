@extends('layouts.layout')

@section('content')


<h1 class="text-center text-primary">Order List</h1>


<div class="col-10 m-auto card">
    <div class="card-body">
        <a href="{{route('orders.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="bi bi-plus-circle"></i> Add New Customer</a>
        <table class="table table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->$customer?->name}}</td>
                    <td class="col-3">
                        <form action="" method="post">
                            @csrf
                            
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
        {{-- {{ $orders->links() }} --}}
    </div>
</div>
