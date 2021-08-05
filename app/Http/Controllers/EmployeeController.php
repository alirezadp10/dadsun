<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employee.index',compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('employee.create',compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        Company::find($request->company_id)->employee()->create($request->validated());

        return redirect(route('employee.index'));
    }

    public function show($id)
    {
        $employee = Employee::with('comments')->find($id);

        return view('employee.show',compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::with('company')->find($id);

        $companies = Company::all();

        return view('employee.edit',compact('employee','companies'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect(route('employee.show',$employee->id));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employee.index'));
    }

    public function export()
    {
        $employees = Employee::paginate(10);

        return new EmployeeResource($employees);

    }
}
