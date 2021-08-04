@extends('layout')
@section('title')
    <title>{{ $employee->fullname }}</title>
@endsection
@section('body')
    <div class="container">

        <h2 class="mb-3 mt-3">Show Employee</h2>

        <ul class="list-group mt-2">
            <li class="list-group-item">
                first name: {{ $employee->first_name }}
            </li>
            <li class="list-group-item">
                last name: {{ $employee->last_name }}
            </li>
            <li class="list-group-item">
                email: {{ $employee->email }}
            </li>
            <li class="list-group-item">
                telephone: {{ $employee->telephone }}
            </li>
            <li class="list-group-item">
                company: {{ $employee->company->name }}
            </li>
        </ul>

        <a class="btn btn-warning fixed mt-3"
           href="{{ route('employee.edit',$employee->id) }}"
           role="button">edit</a>

        <a class="btn btn-danger fixed mt-3"
           href="{{ route('employee.destroy',$employee->id) }}"
           onclick="event.preventDefault();document.getElementById('delete-employee').submit();"
           role="button">delete</a>

        <form id="delete-employee"
              action="{{ route('employee.destroy',$employee->id) }}"
              method="POST"
              hidden>
            @method('DELETE')
            @csrf
        </form>

    </div>
@endsection
