<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;



class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(
        CustomerService $customerService
    )
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->customerList();

        return view('customer.index')->with(['customers'=>$customers]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'phone'=>'required'
        ]);

        $customer = $this->customerService->storeCustomer($data);

        return redirect()->route('customers.index')->withSuccess('Customer Added Successfully');
    }

    public function edit($id)
    {
        $customer = $this->customerService->editCustomer($id);

        return view('customer.edit')->with(['customer'=>$customer]);

    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required',
            'phone'=>'required'
        ]);

        $customer = $this->customerService->updateCustomer($data, $id);

        return redirect()->route('customers.index')->withSuccess('Customer Updated Successfully');
    }

    public function destroy($id)
    {
        $customer = $this->customerService->deleteCustomer($id);

        return redirect()->route('customers.index')->withSuccess('Customer Updated Successfully');
    }
}
