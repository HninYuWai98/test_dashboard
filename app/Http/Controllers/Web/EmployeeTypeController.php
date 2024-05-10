<?php

namespace App\Http\Controllers\Web;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmployeeType\EmployeeTypeService;

class EmployeeTypeController extends Controller
{
    protected $employeeTypeService;

    public function __construct(
        EmployeeTypeService $employeeTypeService
    )
    {
        $this->employeeTypeService = $employeeTypeService;
    }

    public function index()
    {
        $employeeTypes = $this->employeeTypeService->getAllEmplopyeeType();

        return view('employeeType.index')->with(['employeeTypes'=>$employeeTypes]);
    }

    public function create()
    {
        return view('employeeType.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'type' => 'required|string|min:5',
        //     'image' => 'required|mimes:png,jpg,jpeg,webp',
        //     'salary' => 'required|integer'
        // ]);


        //  // Retrieve form data
        //  $type = $request->input('type');
        //  $image = $request->file('image');
        //  $salary = $request->input('salary');

         // Process the file upload (move to desired directory, save to database, etc.)
        //  $fileName = time().'_'.$image->getClientOriginalName();
        //  $image->move(public_path('uploads/employeeType'), $fileName);


        // EmployeeType::Create();

        $employeeType = new EmployeeType;
        $employeeType->type= $request->input('type');
        if($request->has('image'))
        {
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/employeeTypes/',$filename);

            $employeeType->image= $filename;
        }
        $employeeType->salary=$request->input('salary');
        $employeeType->save();


        // $employeeType = $this->employeeTypeService->storeEmployee($data);

        return redirect()->route('employeeTypes.index')->withSuccess('New Employee Type is added successfully.');
    }

    public function show($id)
    {
        $employeeType = EmployeeType::findOrFail($id);

        return view('employeeType.show')->with(['employeeType'=>$employeeType]);
    }

    public function edit($id)
    {
        $employeeType = $this->employeeTypeService->editEmployee($id);

        return view('employeeType.edit')->with(['employeeType'=>$employeeType]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'required|min:5|max:20',
            'salary' => 'required|'
        ]);

        $employeeType = $this->employeeTypeService->updateEmployee($data, $id);

        return redirect()->route('employeeTypes.index')->withSuccess('Employee Type is updated successfully.');
    }

    public function destroy($id)
    {
        $employeeType = $this->employeeTypeService->deleteEmployee($id);

        return redirect()->route('employeeTypes.index')->withSuccess('Employee Type is deleted successfully.');
    }
}
