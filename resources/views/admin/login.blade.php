<html>
    <title>Admin Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <body>
            <div class="container">
                <h1>Admiin login</h1>

                @if ($errors->any())
                    @foreach ( $errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif

                @if (Session::has('error'))
                    <li>{{Session::get('error')}}</li>
                @endif
                @if (Session::has('success'))
                    <li>{{Session::get('success')}}</li>
                @endif

                <form action="{{route('admin.login_submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Forget Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </body>
</html>
