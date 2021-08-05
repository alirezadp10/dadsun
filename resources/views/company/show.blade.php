@extends('layout')
@section('title')
    <title>{{ $company->name }}</title>
@endsection
@section('body')

    <div class="container">

        <h2 class="mb-3 mt-3">Show Company</h2>

        <img src="{{ $company->logo }}" class="img img-responsive">

        <ul class="list-group mt-2">
            <li class="list-group-item">
                name: {{ $company->name }}
            </li>
            <li class="list-group-item">
                email: {{ $company->email }}
            </li>
            <li class="list-group-item">
                url: {{ $company->url }}
            </li>
        </ul>

        <h4 class="mb-3 mt-4">Employees</h4>

        <ul class="list-group mt-2">
            @foreach($company->employee as $employee)
                <li class="list-group-item">
                    fullname: {{ $employee->fullname }}
                </li>
            @endforeach
        </ul>

        <a class="btn btn-warning fixed mt-3"
           href="{{ route('company.edit',$company->id) }}"
           role="button">edit</a>

        <a class="btn btn-danger fixed mt-3"
           href="{{ route('company.destroy',$company->id) }}"
           onclick="event.preventDefault();document.getElementById('delete-company').submit();"
           role="button">delete</a>

        <form id="delete-company"
              action="{{ route('company.destroy',$company->id) }}"
              method="POST"
              hidden>
            @method('DELETE')
            @csrf
        </form>

    </div>

@endsection
