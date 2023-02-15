<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        // $employeeArr = Employee::with('company_details')->get();
        $employeeArr = Employee::get();
        return view('admin.employee.index', compact('employeeArr'));
    }

    public function create()
    {
        $companyArr = Company::get();
        return view('admin.employee.create', compact('companyArr'));
    }

    public function store(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'company_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:companies',
            'phone_number' => 'required',
            'status' => 'required',

        ], [
            'company_id.required' => 'Please select company',
            'first_name.required' => 'Please enter the first name',
            'last_name.required' => 'Please enter the last name',
            'email.required' => 'Please enter email address',
            'phone_number.required' => 'Please enter email phone number',
            'status.required' => 'Please select status',
        ]);
        */
        $employee_create = new Employee;
        $employee_create->company_id = $request->company_id;
        $employee_create->first_name = $request->first_name;
        $employee_create->last_name = $request->last_name;
        $employee_create->email = $request->email;
        $employee_create->phone_number = $request->phone_number;
        $employee_create->status = $request->status;
        $employee_create->save();

        return redirect()->route('admin.employee.index')->with('success','Employee added successfully');
    }

    public function view($id)
    {
        $employee_view = Employee::where('id',$id)->first();
        return view('admin.employee.view',compact('employee_view'));
    }

    public function edit($id)
    {
        $companyArr = Company::get();
        $employee_edit = Employee::where('id',$id)->first();
        return view('admin.employee.edit',compact('employee_edit', 'companyArr'));
    }

    public function update(Request $request)
    {
        // p($request->all());
        /*
        $validatedRequestData = $request->validate([
            'company_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:companies',
            'phone_number' => 'required',
            'status' => 'required',

        ], [
            'company_id.required' => 'Please select company',
            'first_name.required' => 'Please enter the first name',
            'last_name.required' => 'Please enter the last name',
            'email.required' => 'Please enter email address',
            'phone_number.required' => 'Please enter email phone number',
            'status.required' => 'Please select status',
        ]);
        */
        $employee_update = Employee::where('id',$request->id)->first();
        $employee_update->company_id = $request->company_id;
        $employee_update->first_name = $request->first_name;
        $employee_update->last_name = $request->last_name;
        $employee_update->email = $request->email;
        $employee_update->phone_number = $request->phone_number;
        $employee_update->status = $request->status;
        $employee_update->save();

        return redirect()->route('admin.employee.index')->with('success','Employee updated successfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Employee::where('id',$id)->delete();
        return redirect()->route('admin.employee.index')->with('success','Employee deleted successfully');
    }

    public function employee_status_update(Request $request)
    {
        $status_update = Employee::where('id',$request->employee_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.employee.index')->with('success','Status update successfully');
    }
}
