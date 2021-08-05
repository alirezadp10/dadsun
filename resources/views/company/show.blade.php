@extends('layout')
@section('title')
    <title>{{ $company->name }}</title>
@endsection
@section('body')

    <div class="container">

        @auth()

            @if($company->user_id == auth()->id())

                <a class="btn btn-warning float-right mt-3"
                   href="{{ route('company.edit',$company->id) }}"
                   role="button">edit</a>

                <a class="btn btn-danger float-right mr-2 mt-3"
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

            @endif

        @endauth

        <h2 class="mb-5 mt-3 inline">Show Company</h2>

        <img src="{{ $company->logo }}"
             class="img img-responsive">

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

        <h4 class="mb-3 mt-4">Employees:</h4>

        <ul class="list-group mt-2">
            @foreach($company->employee as $employee)
                <li class="list-group-item">
                    fullname: {{ $employee->fullname }}
                </li>
            @endforeach
        </ul>

        @include('partials.comments',['comments' => $company->comments])

        @auth()
            @include('partials.comment-form',['commentable_id' => $company->id , 'commentable_type' => 'company' ])
        @endauth
    </div>

@endsection
