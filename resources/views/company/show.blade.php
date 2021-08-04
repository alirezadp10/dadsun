<!doctype html>
<html lang="en">
<head>
    <title>{{ $company->name }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>

<div class="container">

    <ul class="list-group mt-5">
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

    <a class="btn btn-primary fixed mt-3"
       href="{{ route('company.index') }}"
       role="button">back</a>

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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
