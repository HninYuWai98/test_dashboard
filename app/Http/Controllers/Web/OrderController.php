<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $orderService;
    protected $customerService;

    public function __construct(
        OrderService $orderService,
        CustomerService $customerService
    )
    {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        $orders = $this->orderService->getOrder();

        return view('order.index')->with(['orders'=>$orders]);
    }

    public function create()
    {
        $customers = $this->customerService->getAllCustomers();

        return view('order.create')->with(['customers'=>$customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'nullable'
        ]);

        $data=$request->all();

        $order = $this->orderService->storeOrder($data);

        return redirect()->route('orders.index')->withSuccess('Order Added Successfully');
    }

    // public function edit($id)
    // {
    //     $order = $this->orderService->editOrder($id);

    //     return view('order.edit')->with(['order'=>$order]);

    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'name'=>'required',
    //         'phone'=>'required'
    //     ]);

    //     $order= $this->orderService->updateOrder($data, $id);

    //     return redirect()->route('orders.index')->withSuccess('Order Updated Successfully');
    // }
}
