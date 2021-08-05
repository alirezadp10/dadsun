@extends('layout')
@section('title')
    <title>Companies</title>
@endsection
@section('body')

    <div class="container">

        <a class="btn btn-primary float-right"
           href="{{ route('company.create') }}"
           role="button">create</a>

        <a class="btn btn-info float-right mr-2"
           href="{{ route('company.export') }}"
           role="button">export</a>

        <h2 class="mb-3 mt-3">Companies List</h2>

        <ul class="list-group mt-4">
            @foreach ($companies as $company)
                <li class="list-group-item">
                    <a href="{{ route('company.show',$company->id) }}">
                        {{ $company->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{ $companies->links() }}

@endsection
