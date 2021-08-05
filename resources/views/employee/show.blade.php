@extends('layout')
@section('title')
    <title>{{ $employee->fullname }}</title>
@endsection
@section('body')
    <div class="container">

        @auth()

            @if($employee->company->user_id == auth()->id())

                <a class="btn btn-warning float-right mt-3"
                   href="{{ route('employee.edit',$employee->id) }}"
                   role="button">edit</a>

                <a class="btn btn-danger float-right mt-3 mr-2"
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

            @endif

        @endauth

        <h2 class="mb-5 mt-3 inline">Show Employee</h2>

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

        @include('partials.comments',['comments' => $employee->comments])

        @auth()
            @include('partials.comment-form',['commentable_id' => $employee->id , 'commentable_type' => 'employee' ])
        @endauth


    </div>
@endsection
