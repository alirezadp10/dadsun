@extends('layout')
@section('title')
    <title>create employee form</title>
@endsection
@section('body')
    <div class="container">
        <h2 class="mb-3 mt-3">Create Employee Form</h2>

        <div class="card border-black mt-4 mb-4">
            <div class="card-body">
                <form action="{{ route('employee.store') }}"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               id="first_name"
                               placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               id="last_name"
                               placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               id="email"
                               placeholder="Enter email addres">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text"
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
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
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
