<?php

namespace App\Http\Controllers;

use App\Events\CompanyWasCreatedEvent;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('company.index',compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        auth()->user()->company()->create($request->validated());

        session()->flash('message','Congratulations! company was registerd.');

        CompanyWasCreatedEvent::dispatch($request->user());

        return redirect(route('company.index'));
    }

    public function show($id)
    {
        $company = Company::with('employee','comments')->find($id);

        return view('company.show',compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    public function update(CompanyRequest $request,Company $company)
    {
        $company->update($request->validated());

        return redirect(route('company.show',$company->id));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect(route('company.index'));
    }

    public function export()
    {
        $companies = Company::with('employee')->paginate(10);

        return new CompanyResource($companies);
    }
}
