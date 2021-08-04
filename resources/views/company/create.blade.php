@extends('layout')
@section('title')
    <title>create company</title>
@endsection
@section('body')
    <div class="container">

        <h2 class="mb-3 mt-3">Create Company Form</h2>

        <div class="card border-black mt-4 mb-4">
            <div class="card-body">
                <form action="{{ route('company.store') }}"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="name"
                               placeholder="Enter company name">
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
                        <label for="url">Url</label>
                        <input type="text"
                               name="url"
                               class="form-control"
                               id="url"
                               placeholder="Enter url address">
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
