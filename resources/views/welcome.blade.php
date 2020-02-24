<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Contact</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                        @endif
                        <form action="/contact" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fname">Firstname</label>
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="First name"
                                    aria-describedby="helpId">
                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                            </div>
                            <div class="form-group">
                                <label for="lname">Lastname</label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname"
                                    aria-describedby="helpId">
                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email"
                                    aria-describedby="helpId">
                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                            </div>
                            <div class="form-group">
                                <label for="number">Contact Number</label>
                                <input type="number" name="number" id="number" class="form-control"
                                    placeholder="9123456789" aria-describedby="helpId">
                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $contact->fname }}</td>
                                    <td>{{ $contact->lname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->number }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#edit-{{ $contact->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit-{{ $contact->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/contact/{{ $contact->id }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="fname">Firstname</label>
                                                                <input type="text" name="fname" id="fname"
                                                                    value="{{ $contact->fname }}" class="form-control"
                                                                    placeholder="First name" aria-describedby="helpId">
                                                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lname">Lastname</label>
                                                                <input type="text" name="lname" id="lname"
                                                                    class="form-control" placeholder="Lastname"
                                                                    value="{{ $contact->lname }}"
                                                                    aria-describedby="helpId">
                                                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="email"
                                                                    class="form-control" placeholder="email"
                                                                    value="{{ $contact->email }}"
                                                                    aria-describedby="helpId">
                                                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="number">Contact Number</label>
                                                                <input type="number" name="number" id="number"
                                                                    class="form-control" placeholder="9123456789"
                                                                    value="{{ $contact->number }}"
                                                                    aria-describedby="helpId">
                                                                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-success">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="/contact/{{ $contact->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {!! $contacts->render() !!}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
