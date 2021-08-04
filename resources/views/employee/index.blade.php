@extends('layout')
@section('title')
    <title>Employees</title>
@endsection
@section('body')
    <div class="container">

        <a class="btn btn-primary float-right"
           href="{{ route('employee.create') }}"
           role="button">create</a>

        <h2 class="mb-3 mt-3">Employees List</h2>

        <ul class="list-group mt-4">
            @foreach ($employees as $employee)
                <li class="list-group-item">
                    <a href="{{ route('employee.show',$employee->id) }}">
                        {{ $employee->full_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{ $employees->links() }}
@endsection
