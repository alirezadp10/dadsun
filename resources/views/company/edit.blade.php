<!doctype html>
<html lang="en">
<head>
    <title>edit company</title>
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
    <div class="card border-black mt-4 mb-4">
        <div class="card-body">
            <form action="{{ route('company.update',$company->id) }}"
                  method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           value="{{ $company->name }}"
                           name="name"
                           class="form-control"
                           id="name"
                           placeholder="Enter company name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email"
                           value="{{ $company->email }}"
                           name="email"
                           class="form-control"
                           id="email"
                           placeholder="Enter email addres">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text"
                           value="{{ $company->url }}"
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
