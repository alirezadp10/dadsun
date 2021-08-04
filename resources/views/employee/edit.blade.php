@extends('layout')
@section('title')
    <title>edit employee form</title>
@endsection
@section('body')
    <div class="container">
        <h2 class="mb-3 mt-3">Edit Employee Form</h2>

        <div class="card border-black mt-4 mb-4">
            <div class="card-body">
                <form action="{{ route('employee.update', $employee->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"
                               value="{{ $employee->first_name }}"
                               name="first_name"
                               class="form-control"
                               id="first_name"
                               placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"
                               value="{{ $employee->last_name }}"
                               name="last_name"
                               class="form-control"
                               id="last_name"
                               placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"
                               value="{{ $employee->email }}"
                               name="email"
                               class="form-control"
                               id="email"
                               placeholder="Enter email addres">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text"
                               value="{{ $employee->telephone }}"
                               name="telephone"
                               class="form-control"
                               id="telephone"
                               placeholder="Enter telephone number">
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control"
                                name="company_id"
                                id="company_id">
                            @foreach($companies as $company)
                                <option @if($company->id == $employee->company->id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                            class="btn btn-primary">Submit
                    </button>
                </form>
            </div>
        </div>

        @if($errors->any())
            <span class="alert-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </span>
        @endif

    </div>
@endsection
