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